document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");

    if (calendarEl) {
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: "dayGridMonth",
            events: "/jadwal-reservasi", // route Laravel untuk ambil data JSON
            eventColor: "#1bcfb4",
            selectable: true,
            dateClick: function (info) {
                alert("Klik tanggal: " + info.dateStr);
                // bisa munculkan modal form reservasi di sini
            },
        });

        calendar.render();
    }
});
