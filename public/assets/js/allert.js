document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".btn-delete");

    deleteButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault(); // cegah form submit langsung

            const form = this.closest("form");

            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data booking akan terhapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
