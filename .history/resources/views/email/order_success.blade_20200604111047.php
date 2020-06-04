<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
    padding: 0;
    margin: 0;
}

.title {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    box-sizing: border-box;
    padding: 25px 0;
    font-size: 19px;
    font-weight: bold;
    text-decoration: none;
    background-color: #f8fafc;
    text-align: center;
}

#text {
    color: #bbbfc3;
}

.title2 {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    box-sizing: border-box;
    color: #3d4852;
    font-size: 12px;
    font-weight: bold;
    margin-top: 0;
    /* text-align: left */
}

.content {
    /* display: flex; */
}

.side-box {
    width: 50%;
    display: flex;
}

.message {
    /* width: 50%; */
    /* display: flex; */
    font-size: 10px;
    margin-top: 20px;
    color: #3d4852;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    /* justify-content: flex-end !important; */
    text-align: center;
}

.message2 {
    width: 50%;
    display: flex;
    font-size: 15px;
    justify-content: flex-start;
    color: #3d4852;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    box-sizing: border-box;
    color: #3d4852;
    font-size: 16px;
    line-height: 1.5em;
    margin-top: 0;
    /* text-align: left; */
}

.content2 {
    display: flex;
}

.content3 {
    display: flex;
}

.button {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    box-sizing: border-box;
    border-radius: 3px;
    color: #fff;
    display: inline-block;
    text-decoration: none;
    background-color: #3490dc;
    border-top: 10px solid #3490dc;
    border-right: 18px solid #3490dc;
    border-bottom: 10px solid #3490dc;
    border-left: 18px solid #3490dc;
}

.content4 {
    display: flex;
}

.endmessage {
    display: flex;
    width: 50%;
    height: 50px;
    justify-content: flex-start;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    box-sizing: border-box;
    color: #3d4852;
    font-size: 16px;
    line-height: 1.5em;
    margin-top: 0;
    /* align-items: flex-end; */
}

#thanks {
    display: flex;
    width: 50%;
}

#admin {
    font-weight: bold;
    width: 50%;
    display: flex;
}

.titleend {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    box-sizing: border-box;
    padding: 25px 0;
    font-size: 12px;
    font-weight: bold;
    text-decoration: none;
    background-color: #f8fafc;
    text-align: center;
    margin-top: 45px;
}

.message{

    /* justify-content: flex-end !important; */

}
    </style>
    <title>ECCOMERCE</title>
</head>

<body>
    <div id="container">
        <div class="title">
            <p id="text">
            ECCOMERCE
            </p>
        </div>
        <div class="content">

            <div class="message">
                <h1>WELCOME TO ECCOMERCE!</h1>
            </div>
            <div class="side-box">

            </div>
        </div>
        <div class="content2">
            <div class="side-box" style="width:48%">

            </div>
            <div class="message2">
                <p>Hello {{ucfirst($name)}} we have Finished Reviewing your account, You can now set
                    your schedules and manage your classes
                </p>
            </div>
            <div class="side-box">

            </div>
        </div>


        <div class="content3">
            <div class="side-box" style="width:45%">

            </div>
            <div>
                <a href="{{$url}}"> <button class="button">Login Account</button></a>
            </div>
            <div class="side-box" style="width:40%">

            </div>
        </div>

        <div class="content4">
            <div class="side-box">

            </div>
            <div class="endmessage">
                <div id="thanks">
                <h4>Drago Admin,</h4>
                </div>
                
                <div id="admin"> </div>
            </div>
            <div class="side-box">

            </div>
        </div>



        <div class="titleend">
            <p id="text">
            © 2020 ECCOMERCE. All rights reserved.
            </p>
        </div>
    </div>

</body>

</html>