function validateForm()
{
    var fullname=document.getElementById('fullname');
    var email=document.getElementById('email');
    var mobile=document.getElementById('mobile');
    var password=document.getElementById('password');
    var password2=document.getElementById('password2');
    var state=document.getElementById('state');
    var message=document.getElementsByClassName('message');
    var sucess=document.getElementsByClassName('sucess');
    var error=document.getElementsByClassName('error');

    //submit success variable
    let fn=0;
    let e=0;
    let m=0;
    let p=0;
    let p2=0;
    let g=0;
    let s=0;


    //validation for fullname
    if(fullname.value=="")
    {
        message[0].style.visibility='visible';
        message[0].style.color='red';
        message[0].innerText="Fullname cannot be blank";
        error[0].style.visibility='visible';
        error[0].style.color='red';
        fn=0;
    }
    else
    {
        var regex= /^[A-Z]+[\sa-zA-Z]*$/;    
        if(regex.test(fullname.value) === false) 
        {
            message[0].style.visibility = 'visible';
            message[0].style.color='red';
            message[0].innerText="First character should in uppercase & Number is not allowed";
            error[0].style.visibility = 'visible';
            error[0].style.color='red';
            fn=0;
        }
        else
        {
            error[0].style.visibility = 'hidden';
            message[0].style.visibility = 'hidden';
            sucess[0].style.visibility = 'visible';
            sucess[0].style.color='green';
            fn=1;
        }
    }

    //validation for email
    if(email.value=="")
    {
        message[1].style.visibility = 'visible';
        message[1].style.color='red';
        message[1].innerText="Email cannot be blank";
        error[1].style.visibility = 'visible';
        error[1].style.color='red';
        e=0;
    }
    else
    {
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email.value) === false) 
        {
            message[1].style.visibility = 'visible';
            message[1].style.color='red';
            message[1].innerText="Please enter a valid email address";
            error[1].style.visibility = 'visible';
            error[1].style.color='red';
            e=0;
        }
        else
        {
            error[1].style.visibility = 'hidden';
            message[1].style.visibility = 'hidden';
            sucess[1].style.visibility = 'visible';
            sucess[1].style.color='green';
            e=1;
        }
    }


    //validation for mobile number
    if(mobile.value=="")
    {
        message[2].style.visibility = 'visible';
        message[2].style.color='red';
        message[2].innerText="Mobile number cannot be blank";
        error[2].style.visibility = 'visible';
        error[2].style.color='red';
        m=0;
    }
    else
    {
        var regex = /^\d{2}-\d{7,8}$/;
        if(regex.test(mobile.value) === false) 
        {
            message[2].style.visibility = 'visible';
            message[2].style.color='red';
            message[2].innerText="Please enter a valid 9/10 digit mobile number with(-)";
            error[2].style.visibility = 'visible';
            error[2].style.color='red';
            m=0;
        }
        else
        {
            error[2].style.visibility = 'hidden';
            message[2].style.visibility = 'hidden';
            sucess[2].style.visibility = 'visible';
            sucess[2].style.color='green';
            m=1;
        }
    }


    //validation of password
    if (password.value=="")
    {
        message[3].style.visibility = 'visible';
        message[3].style.color='red';
        message[3].innerText="Password cannot be blank";
        error[3].style.visibility = 'visible';
        error[3].style.color='red';
        p=0;
    }
    else
    {
        var regex = /(?=^.{5,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z])(?!.*\s).*$/;
        if(regex.test(password.value) === false) 
        {
            message[3].style.visibility = 'visible';
            message[3].style.color='red';
            message[3].innerText="Please enter a valid password";
            error[3].style.visibility = 'visible';
            error[3].style.color='red';
            p=0;
            alert("Must contain  ONE upppercase, ONE lowercase, ONE special character, numbers, no space.  It must be at least 5 characters!! ");
        }
        else
        {
            error[3].style.visibility = 'hidden';
            message[3].style.visibility = 'hidden';
            sucess[3].style.visibility = 'visible';
            sucess[3].style.color='green';
            p=1;
        }
    }

    //validation for password check
    if(password2.value=="")
    {
        message[4].style.visibility = 'visible';
        message[4].style.color='red';
        message[4].innerText="Password cannot be blank";
        error[4].style.visibility = 'visible';
        error[4].style.color='red';
        p2=0;
    }
    else if(password.value!=password2.value)
    {
        message[4].style.visibility = 'visible';
        message[4].style.color='red';
        message[4].innerText="Password does not match";
        error[4].style.visibility = 'visible';
        error[4].style.color='red';
        p2=0;
    }
    else
    {
        error[4].style.visibility = 'hidden';
        message[4].style.visibility = 'hidden';
        sucess[4].style.visibility = 'visible';
        sucess[4].style.color='green';
        p2=1;
    }


    //validation for gender
    var gender = document.getElementsByName('gender');
    var genValue = false;

    for(var i=0; i<gender.length;i++)
    {
        if(gender[i].checked == true)
        {
            genValue = true;    
        }
    }
    if(!genValue)
    {
        message[5].style.visibility = 'visible';
        message[5].style.color='red';
        message[5].innerText="Please choose you gender";
        error[5].style.visibility = 'visible';
        error[5].style.color='red';
        g=0;
    }
    else
    {
        error[5].style.visibility = 'hidden';
        message[5].style.visibility = 'hidden';
        sucess[5].style.visibility = 'visible';
        sucess[5].style.color='green';
        g=1;
    }


    //validation for state
    if(state.value=="") 
    {
        message[6].style.visibility = 'visible';
        message[6].style.color='red';
        message[6].innerText="Please choose you state";
        error[6].style.visibility = 'visible';
        error[6].style.color='red';
        s=0;
    }
    else
    {
        error[6].style.visibility = 'hidden';
        message[6].style.visibility = 'hidden';
        sucess[6].style.visibility = 'visible';
        sucess[6].style.color='green';
        s=1;
    }

    //return condition//
    if(fn==1 && e==1 && m==1 && p==1 && p2==1 && g==1 && s==1)
    {
        return true;
    }
    else
        return false;

}
