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
/*function showPage(pageId) {
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
}*/
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


//========  ตรงนี้คือส่วนน Home ค้าบ======================
// JavaScript Code
/*let images = [
  '../logo/announcement1.jpg',
  '../logo/announcement2.jpg',
  '../logo/announcement3.jpg'
];

let currentImageIndex = 0;
let announcementImages = document.querySelectorAll('.announcement-box img');

// เพิ่มฟังก์ชันเพื่อเปลี่ยนภาพไปยังภาพถัดไป
function nextImage() {
  currentImageIndex = (currentImageIndex + 1) % images.length;
  updateImage();
}

// เพิ่มฟังก์ชันเพื่อเปลี่ยนภาพไปยังภาพก่อนหน้า
function prevImage() {
  currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
  updateImage();
}

// เพิ่มฟังก์ชันเพื่ออัพเดตรูปภาพที่แสดงบนหน้าเว็บ
function updateImage() {
  announcementImages.forEach(function(image, index) {
      if (index === currentImageIndex) {
          image.style.display = 'block'; // แสดงรูปภาพที่ต้องการ
      } else {
          image.style.display = 'none'; // ซ่อนรูปภาพที่ไม่ได้แสดง
      }
  });
}

// เพิ่มเมื่อหน้าเว็บโหลดเสร็จ
window.addEventListener('load', function() {
  // แสดงรูปภาพแรกเมื่อหน้าเว็บโหลดเสร็จ
  updateImage();

  // เมื่อผู้ใช้เลื่อนเมาส์ไปชี้ไปยังภาพประกาศ
  announcementImages.forEach(function(image) {
      image.addEventListener('mouseenter', function() {
          // หยุดการเปลี่ยนภาพ
          clearInterval(imageInterval);
      });

      image.addEventListener('mouseleave', function() {
          // เริ่มการเปลี่ยนภาพอีกครั้งหลังจากผู้ใช้เลื่อนเมาส์ออกจากภาพ
          imageInterval = setInterval(changeImage, 2000);
      });
  });
});

// เพิ่มเหตุการณ์กดปุ่มบนคีย์บอร์ด
document.addEventListener('keydown', function(event) {
  // ถ้ากดลูกศรซ้าย
  if (event.keyCode === 37) {
      prevImage(); // เรียกใช้ฟังก์ชันเปลี่ยนภาพไปยังภาพก่อนหน้า
  }
  // ถ้ากดลูกศรขวา
  else if (event.keyCode === 39) {
      nextImage(); // เรียกใช้ฟังก์ชันเปลี่ยนภาพไปยังภาพถัดไป
  }
});
*/

// ========================= ส่วน LENDING ===========================
function openPopup(status) {
  // ตรวจสอบว่าข้อมูลถูกกรอกครบหรือไม่
  // var bookID = document.querySelector('input[name="book_id"]').value;
  // var bookPrice = document.querySelector('input[name="book_price"]').value;
  // var customerName = document.querySelector('input[name="customer_name"]').value;
  // var citizenID = document.querySelector('input[name="citizen_id"]').value;
  // var phone = document.querySelector('input[name="phone"]').value;
  // var startDate = document.querySelector('input[name="start_date"]').value;
  // var email = document.querySelector('input[name="email"]').value;
  // var returnDate = document.querySelector('input[name="return_date"]').value;
  // var totalPrice = document.querySelector('input[name="total_price"]').value;

  // ตรวจสอบว่ามีข้อมูลทุกอย่างถูกกรอกหรือไม่
  // if (bookID && bookPrice && customerName && citizenID && phone && startDate && email && returnDate && totalPrice) {
    if (status === "success") {
      // แสดงป๊อปอัพสำหรับสถานะ "success"
      document.getElementById("successPopup").style.display = "block";
      // แสดง overlay เพื่อบังคับให้ผู้ใช้ใช้ป๊อปอัพเท่านั้น
      document.getElementById("overlay").style.display = "block";
    } else if (status === "failure") {
      // แสดงป๊อปอัพสำหรับสถานะ "failure"
      document.getElementById("failurePopup").style.display = "block";
      // แสดง overlay เพื่อบังคับให้ผู้ใช้ใช้ป๊อปอัพเท่านั้น
      document.getElementById("overlay").style.display = "block";
    }
  // } else {
  //   // แจ้งเตือนให้กรอกข้อมูลให้ครบ
  //   alert("Please fill in all fields before proceeding.");
 // }
}

// ฟังก์ชันปิดป๊อปอัพ
function closePopup() {
  // ซ่อนป๊อปอัพทั้งหมด
  document.getElementById("successPopup").style.display = "none";
  document.getElementById("failurePopup").style.display = "none";
  // ซ่อน overlay
  document.getElementById("overlay").style.display = "none";
} 
function checkPasswords() {
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('confirm_password');
  const passwordError = document.getElementById('password_error');

  if (passwordInput.value !== confirmPasswordInput.value) {
      passwordError.style.display = 'block';
  } else {
      passwordError.style.display = 'none';
  }
}

const confirmPasswordInput = document.getElementById('confirm_password');
confirmPasswordInput.addEventListener('input', checkPasswords);

document.getElementById("searchInput").addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
      event.preventDefault(); // Prevent default form submission
      document.getElementById("searchForm").submit(); // Submit the form
  }
});

/////////////////////////////////////////////
// เพิ่มตัวแปรเพื่อเก็บ ID ของ interval เพื่อเรียกใช้ clearInterval() ในกรณีที่ต้องการหยุดการเปลี่ยนภาพ
let imageInterval;

// เพิ่มฟังก์ชันเพื่อเปลี่ยนภาพไปยังภาพถัดไปทุก 2 วินาที
function changeImage() {
  nextImage();
}

// เริ่มการเปลี่ยนภาพทุก 2 วินาที เมื่อหน้าเว็บโหลดเสร็จ
window.addEventListener('load', function() {
  imageInterval = setInterval(changeImage, 1000);
});
