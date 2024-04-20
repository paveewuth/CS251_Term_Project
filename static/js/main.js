//
let list = document.querySelectorAll(".sidebar li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".sidebar");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
//====================================================================================================

let subMenu = document.getElementById("subMenu");

function toggleMenu(){
  subMenu.classList.toggle("open-menu");
  subMenu.style.zIndex = 1;
  
}
// ================================================================================================
// Gemini ทำให้
function showPage(pageId) {
  // ซ่อนหน้าทั้งหมด
  const allPages = document.querySelectorAll(".content > div"); //:ซ้อนหน้าช่วง content เป็นต้นไป
  for (const page of allPages) {
      page.style.display = "none";
  }

  // แสดงเฉพาะหน้าที่ต้องการ
  const targetPage = document.getElementById(pageId);
  if (targetPage) {
      targetPage.style.display = "block";
  }
}

showPage('home');  //  แสดงหน้าแรก ("home") ตั้งแต่เริ่มต้น
