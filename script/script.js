function did() {
    swal.fire({
       title: "Address",
       text: "Jalan ImanJ ohor Bahru, Johor 81310",
       imageUrl: 'img/icons/location-dot-solid.png'
    });
 }

 function did2() {
    swal.fire({
       title: "Phone",
       text: "+601121792872",
       imageUrl: 'img/icons/phone-solid.png',
    });
 }

 function did3() {
    swal.fire({
       title: "Email",
       text: "marketify.utm@gmail.com",
       imageUrl: 'img/icons/envelope-solid.png'
    });
 }

 function did4() {
    swal.fire({
       title: "Hours",
       text: "10:00 - 18:00, Sun - Thurs",
       imageUrl: 'img/icons/clock-solid.png'
    });
 }

 const questions = document.querySelectorAll('.question-answer');

questions.forEach(function(question) {
    const btn = question.querySelector('.question-btn');
    btn.addEventListener("click", function() {
        questions.forEach(function(item) {
            if (item !== question) {
                item.classList.remove("show-text");
            }
        })
        question.classList.toggle("show-text");
    })
})