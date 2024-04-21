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
// สำหรับเปลี่ยนไปหน้าโปรไฟล์ ====================================================================================================
let userDiv = document.querySelector(".user");
let subMenu = document.getElementById("subMenu");

userDiv.addEventListener("mouseover", function() {
  subMenu.classList.add("open-menu");
  subMenu.style.zIndex = 1;
});

userDiv.addEventListener("mouseout", function(e) {
  // ตรวจสอบว่าเมาส์ไปยัง Submenu หรือไม่
  if (!subMenu.contains(e.relatedTarget)) {
    subMenu.classList.remove("open-menu");
  }
});

subMenu.addEventListener("mouseleave", function(e) {
  // ตรวจสอบว่าเมาส์ไปยัง User Div หรือไม่
  if (!userDiv.contains(e.relatedTarget)) {
    subMenu.classList.remove("open-menu");
  }
});
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
// หน้า Profile
// เพิ่มข้อความลงในช่องให้กรอก
let userID = document.getElementById("userID");
userID.value = "#Staff ID#";

let position = document.getElementById("position");
position.value = "#Position#";

let firstName = document.getElementById("firstName");
firstName.value = "#First Name#";

let lastName = document.getElementById("lastName");
lastName.value = "#Last Name#";

let password = document.getElementById("password");
password.value = "#Passwird#";

let email = document.getElementById("e-mail");
email.value = "#E-mail#";

let phoneNumber = document.getElementById("phoneNumber");
phoneNumber.value = "#Phone number#";

let houseNumber = document.getElementById("houseNumber");
houseNumber.value = "#House number#";

let street = document.getElementById("street");
street.value = "#Street#";

let subdistrict = document.getElementById("subdistrict");
subdistrict.value = "#Subdistrict#";

let district = document.getElementById("district");
district.value = "#Dustrict#";

let province = document.getElementById("province");
province.value = "#Province#";

let zipcode = document.getElementById("zipcode");
zipcode.value = "#Zipcode#";

showPage('home');  //  แสดงหน้าแรก ("home") ตั้งแต่เริ่มต้น
