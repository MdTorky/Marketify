function fn1()
{
    const ID = document.getElementById("ID");
    const password = document.getElementById("Password");
    const form = document.getElementById("form");

//     if((ID.value=='' || ID.value==null) && (password.value==null || password.value==''))
//     {
//         alert("Please enter your ID and the Password")
//     }

//     else if((password.value!='' || password.value!=null) && (ID.value=='' || ID.value==null))
//     {
//         alert("Please enter your ID")
//     }

//     else if((password.value=='' || password.value==null) && (ID.value!='' || ID.value!=null))
//     {
//         alert("Please enter your Password")
//     }

//     else
// {


    // if(a.checked==true)
    // {
    //     if(ID.value=='Admin' && password.value=='2022')
    //     window.location.href="Admin";
    //     else
    //     alert("Please check your information")
    // }

    // else
    // {
    //     alert("Please select your role!")
    // }
}




function admin(){
    
    window.location.href="Sign-in Page Admin.php";
    
}


function AM(){
    window.location.href="Sign-in Page AM.php";
}

function SLogin(){
    window.location.href="Sign-in Page.php";
}





const menu = document.querySelector('.header .nav .nav-list .menu');
const mobile_menu = document.querySelector('.header .nav .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav .nav-list ul li a');
const header = document.querySelector('.header.container');

menu.addEventListener('click', () => {
	menu.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		menu.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});




function did() {
    swal.fire({
       title: "Sweet!",
       text: "Here's a custom image.",
       imageUrl: 'https://i.imgur.com/4NZ6uLY.jpg'
    });
 }