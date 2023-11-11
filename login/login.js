const registerbtn_link = document.querySelector('.registerbtn_link');
const loginbtn_link = document.querySelector('.loginbtn_link');

const wrapper = document.querySelector('.wrapper');

registerbtn_link.addEventListener('click', () => {
    wrapper.classList.toggle('active');
})

loginbtn_link.addEventListener('click', () => {
    wrapper.classList.toggle('active');
})


