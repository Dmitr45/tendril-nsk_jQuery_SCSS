console.log('script.js запущен');



const btn = document.querySelector("#button_send");
const contact = document.querySelector("#contact");
const contactToggle = document.querySelector("#toggle");
const contactGrey = document.querySelector("#grey");

contact.classList.add("zindex0");
contactGrey.classList.add("zindex0");

btn.addEventListener('click', function (event) {

    contact.classList.add("zindex1000");
    contactGrey.classList.add("zindex500");
    contact.classList.remove("zindex0");
    contactGrey.classList.remove("zindex0");


  })

  contactToggle.addEventListener('click', function (event) {

    contact.classList.remove("zindex1000");
    contactGrey.classList.remove("zindex500");
    contact.classList.add("zindex0");
    contactGrey.classList.add("zindex0");

  })
