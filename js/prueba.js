(function(){
    "use strict";

    document.addEventListener('DOMContentLoaded', function(){
   
            //MAPA
            var map = L.map('mapa').setView([20.582492, -101.197944], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            L.marker([20.582492, -101.197944]).addTo(map)
            .bindPopup('Aquí esta Majo.<br> LATINLIVE')
            .openPopup()
            .bindTooltip('Un Tooltip')
            .openTooltip();
    }); //DOM

})();