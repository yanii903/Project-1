// function slideShow
let imgs = [
    "https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/a1/fc/a1fc8dc0f9f6a682c354824baa261329.png",
    "https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/bb/82/bb82f2a4e678c5a1b62c564c975d218e.png",
    "https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/1c/41/1c4171b8a025dcb7202b07c3eb9770ba.png",
    "https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/55/c2/55c25cd91968ae6a32750c3988ce5397.jpg",
];
let img = 0;
let image = document.querySelectorAll("img");
let imgLength = imgs.length;
let imgJS = document.getElementById("imgJS");
imgJS.src = imgs[img];

function handleClickBtn(name) {
    if (name === "Next") {
        if (img + 1 > imgLength - 1) {
            img = 0;
        } else {
            img = img + 1;
        }
    } else {
        if (img - 1 < 0) {
            img = imgLength - 1;
        } else {
            img = img - 1;
        }
    }
    imgJS.src = imgs[img];
    imgJS.classList.add("active");
}

function autoRun() {
    deleteInterval = setInterval(timer, 5000);
    function timer() {
        handleClickBtn("Next");
    }
}
autoRun();

// function icon cart

const changeClass = () => {
    const cart = document.getElementById("cart");

    if (cart.className === "bx bx-cart-alt") {
        cart.className = "bx bxs-cart-alt";
    } else {
        cart.className = "bx bx-cart-alt";
    }
};
const changeClass2 = () => {
    const heart = document.getElementById("heart");
    if (heart.className === "bx bx-heart") {
        heart.className = "bx bxs-heart";
    } else {
        heart.className = "bx bx-heart";
    }
};
const handelClickAdd = () => {
    let one = document.getElementsByClassName("one");
};
