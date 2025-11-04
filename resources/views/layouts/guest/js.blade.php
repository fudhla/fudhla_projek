<script type="module">
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-app.js";
    import {
        getDatabase,
        ref,
        onValue
    } from "https://www.gstatic.com/firebasejs/10.12.1/firebase-database.js";

    const firebaseConfig = {
        apiKey: "AIzaSyExample",
        authDomain: "fasilitasdesa.firebaseapp.com",
        databaseURL: "https://fasilitasdesa-default-rtdb.firebaseio.com",
        projectId: "fasilitasdesa",
        storageBucket: "fasilitasdesa.appspot.com",
        messagingSenderId: "1234567890",
        appId: "1:1234567890:web:abcdefghijk"
    };

    const app = initializeApp(firebaseConfig);
    const db = getDatabase(app);

    const fasilitasRef = ref(db, "fasilitas_umum");

    onValue(fasilitasRef, (snapshot) => {
        const data = snapshot.val();
        const tbody = document.getElementById("fasilitasTable");
        tbody.innerHTML = "";

        if (data) {
            let total = 0,
                lapangan = 0,
                aula = 0;
            Object.values(data).forEach(item => {
                total++;
                if (item.jenis?.toLowerCase().includes("lapangan")) lapangan++;
                if (item.jenis?.toLowerCase().includes("aula")) aula++;

                tbody.innerHTML += `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4">${item.nama || '-'}</td>
                            <td class="py-3 px-4">${item.jenis || '-'}</td>
                            <td class="py-3 px-4">${item.alamat || '-'}</td>
                            <td class="py-3 px-4">${item.kapasitas || '-'}</td>
                            <td class="py-3 px-4">${item.deskripsi || '-'}</td>
                        </tr>
                    `;
            });

            document.getElementById("totalFasilitas").textContent = total;
            document.getElementById("totalLapangan").textContent = lapangan;
            document.getElementById("totalAula").textContent = aula;
        } else {
            tbody.innerHTML =
                `<tr><td colspan="5" class="text-center py-6 text-gray-500">Belum ada data fasilitas.</td></tr>`;
        }
    });
</script>
