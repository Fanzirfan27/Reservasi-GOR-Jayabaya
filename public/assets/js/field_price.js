document.addEventListener("DOMContentLoaded", function () {
    const priceModal = new bootstrap.Modal(
        document.getElementById("priceModal")
    );
    const form = document.getElementById("priceForm");
    const modalTitle = document.getElementById("priceModalLabel");
    const btnAddPrice = document.getElementById("btnAddPrice");
    const storeUrl = btnAddPrice.dataset.storeUrl;

    btnAddPrice.addEventListener("click", function () {
        form.reset();
        modalTitle.textContent = "Tambah Harga";
        form.action = storeUrl;
        form.querySelector('input[name="_method"]')?.remove();
        priceModal.show();
    });

    document.querySelectorAll(".btn-edit-price").forEach((button) => {
        button.addEventListener("click", function () {
            const data = JSON.parse(this.dataset.price);
            modalTitle.textContent = "Edit Harga";
            form.action = `/field-prices/${data.id}`;

            // Tambahkan input hidden _method PUT jika belum ada
            if (!form.querySelector('input[name="_method"]')) {
                const methodInput = document.createElement("input");
                methodInput.type = "hidden";
                methodInput.name = "_method";
                methodInput.value = "PUT";
                form.prepend(methodInput);
            }

            // Isi data ke form
            document.getElementById("field_id").value = data.field_id;
            document.getElementById("jam_mulai").value = data.jam_mulai;
            document.getElementById("jam_selesai").value = data.jam_selesai;
            document.getElementById("harga").value = data.harga;

            priceModal.show();
        });
    });
});
