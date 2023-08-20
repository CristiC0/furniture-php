function Check() {
    let nume = document.getElementById("first-name");
    let error = document.getElementById("error");
    let prenume = document.getElementById("last-name");
    let parola = document.getElementById("passwordLog");
    error.style.display = "none";
    let hrs = document.querySelectorAll("hr");
    for (i of hrs) i.style.borderColor = "black";
    reg_num = /^[A-Za-z]+$/;
    reg_pas = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/;

    if (!reg_num.test(nume.value)) {
        error.innerHTML = "First Name needs to contain just letters";
        error.style.display = "block";
        console.log(document.querySelectorAll("form hr:nth-of-type(1)"));
        document.querySelectorAll(
            "form hr:nth-of-type(1)"
        )[0].style.borderColor = "red";
        return 0;
    } else if (!reg_num.test(prenume.value)) {
        console.log(prenume.value);
        error.innerHTML = "Last Name needs to contain just letters";
        error.style.display = "block";
        document.querySelectorAll(
            "form hr:nth-of-type(2)"
        )[0].style.borderColor = "red";
        return 0;
    } else if (!reg_pas.test(parola.value)) {
        console.log("yeah");
        error.innerHTML =
            "Password needs to be minim 8 characters, have 1 lowercase,1 uppercase letter ,1 digit and 1 symbol";
        error.style.display = "block";
        document.querySelectorAll(
            "form hr:nth-of-type(4)"
        )[0].style.borderColor = "red";
        return 0;
    }
}
