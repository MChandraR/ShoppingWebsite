var add_btn = document.getElementById("add-barang");
var add_area = document.getElementById("add-area");
console.log("Hallo");
add_btn.addEventListener('click',()=>{
    add_area.classList.toggle("show");
    console.log("muncul");
});