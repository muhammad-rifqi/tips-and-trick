const filterbutton = document.querySelectorAll(".filters_button button");
const filterable_card = document.querySelectorAll(".filterable_card .card");

const filter_card = (e) => {
    document.querySelector(".active").classList.remove("active");
    e.target.classList.add("active");
    console.log(e.target);

    filterable_card.forEach((card)=>{
        card.classList.add("hide");
        if(card.dataset.name === e.target.dataset.name || e.target.dataset.name === 'all'){
            card.classList.remove("hide");
        }
    })

}

filterbutton.forEach((button) => {
    button.addEventListener("click", filter_card)
});
