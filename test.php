<!doctype html>
<html class="no-js" lang="">
<!-- 
                RED HAT SINGLE SIGN ON FORM         
                    `.``     .-..`                          
                   ://///:--///////:-.`                     
                  ://///////////////////:-`                 
                 ./////////////////////////:                
                `///////////////////////////-               
                :////////////////////////////`              
                /////////////////////////////-              
       `..-::/: `:////////////////////////////              
     `:////////   `-//////////////////////////.             
    `//////////:`    `-://////////////////////-`            
    `////////////-`      `.-:////////////////-`//-`         
     ://///////////:.          ``...----...`   :////.       
      -///////////////:-.`                    -//////:      
       `://////////////////:--.           .-://///////:     
         `-////////////////////////////////////////////`    
            `-/////////////////////////////////////////`    
               `.:////////////////////////////////////.     
                   `.-://///////////////////////////:`      
                        ``.-:////////////////////:.`        
                                ```-://///////```             
-->
<head>
  <meta charset="utf-8">
  <title>Red Hat Sign-In</title>
  <meta name="description" content="sign-in page for Red Hat employees">
  <meta name="viewport"    content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#cc0000">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    :root {
  font-size: 1.25rem;
  user-select: none;
}

:root {
  font-family: "Red Hat Text", sans-serif;
  --brand: #e00;
  --bg: #fff;
  --fg: #000811;
  --mid: #999;
  outline: none;
}

*,:before,:after{box-sizing:border-box; outline:0}

*{}
body {
  background-color: var(--bg);
  background-color:#fafafa;
  color: var(--fg);
  overscroll-behavior: none;
  /* display: flex;*/
  flex-direction: column;
  overflow: hidden;
  width: 100vw;
  height: 100vh;
  text-align: center;
  display: flex;
}

@media (prefers-color-scheme: dark) {
  :root {
    --bg: #050505;
    --fg: #ddd;
    --mid: #555;
  }
  body{background-color:#050505}
  #band {
    fill: transparent;
  }
  form:before {
    opacity: 0.2 !important;
  }
}



body::before,
body::after {
  content: "";
  /*  flex: 1; */
}

form {
  position: relative;

  display: block;
  border-radius: 0.4rem;
  box-shadow: 0 0.5rem 0.75rem -0.75rem rgba(0, 0, 0, 0.5);

  width: 20rem;
  margin: 0 auto;
  min-height: 4rem;
}

form:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: var(--mid);
  opacity: 0.085;
  z-index: 0;

  border-radius: 0.4rem;
}

/* BEGIN GHETTO RESET */
*,
*:before,
*:after {
  box-sizing: border-box;
  padding: 0;
  appearance: none;
  font-size: 1rem;
  font-weight: 300;
  font-family: "Red Hat Text", sans-serif;
  border: 0;
  box-shadow: 0;
  pointer-events: none;

  text-rendering: optimizelegibility;
}
input {appearance:none;
  pointer-events: all;
  color: currentcolor;
  cursor: pointer;
  box-shadow: none;
  outline:0 !important;
}


small {
  color: var(--mid);
  z-index: 1;
}

:valid + label,
:focus + label {
  z-index: 4;

  transform-origin: 2.5rem 0;
  animation: rise 0.45s ease-out forwards;
   transform: scale(0.75) translate(0, -1rem);
}

@keyframes rise {
  0% {
    transform: scale(1) translate(0, -.5rem);
    color: currentcolor; opacity:0;
  }
  100% {
    transform: scale(0.75) translate(0, -1rem);
  }
}



:valid + label {
  color: var(--mid);
}
:focus + label {
  color: var(--brand);
}

:focus {
  outline: 0;
}

::selection {
  color: #fff;
  background: rgba(238, 0, 0, 0.99);
}

::-moz-focus-inner {
  border: 0;
  outline: 0;
}

label {
  font-weight: 400;
  color: var(--mid);
}
input,
label,
svg,
small {
  width: 10rem;
  height: 4rem;
  line-height: 4.5rem;
  position: absolute;
  padding: 0;
  display: block;
  margin: 0 auto;
  text-indent: 0;
  text-align: left;
}

input[type="text"]:not(:focus),
input[type="password"]:not(:focus) {
}

/* END GHETTO RESET */
[type="submit"] {
  background-color: var(--brand);
  color: #fff;
  border-radius: 0 0 0.4rem 0.4rem;
  text-align: center;
  background-image: linear-gradient(#f00, #c00);
  line-height: 4rem;
  width: 100%;
  position: relative;
  display:block;
  transition: all 0.24s ease;
  overflow: hidden;
  position: absolute;
  bottom: -4rem;
}


[type="submit"]:after{content:""; display:block; position:absolute; height: 4rem; top:0; 
  left: 50%; margin-left: -4rem; transform: skew(-45deg) translate(-200%, 0); background-color:#f00; width: 8rem; transition: all .5s ease;}

[type="submit"]:focus:after{transform: skew(-45deg) translate(200%, 0); opacity:0}
/*hide submit button until fields have input*/
:not(:valid) ~ [type="submit"] {
  opacity: 0;
  transform: translate(0, 0.3rem);
  z-index: 0;
}

:valid ~ :valid ~ [type="submit"] {
  height: 4rem;
  margin-top: 4rem;
  opacity: 1;

  transform: translate(0, -0.1rem);
  box-shadow: 0 0.5rem 0.5rem -0.5rem rgba(0, 0, 0, 0.3);
  transition: all 0.5s cubic-bezier(0.3, 0.2, 0.2, 1);
}

[type="submit"]:focus {
  box-shadow:  
    0 0.5rem 0.5rem -0.5rem rgba(0, 0, 0, 0.3) !important;
}
 
.note {
  position: fixed;
  bottom: 1em;
  left: 0;
  color: var(--mid);
  width: 100%;
  font-size: 0.5em;
  z-index: -1;
}

small {
  opacity: 0;
  font-weight: 200;
}
:focus:not(:valid) + label + small {
  opacity: 0.5;
  transition: opacity 1s ease 1s;
}

label,
small {
  text-indent: 2.75rem;
}

[type="text"],
[type="password"] {
  text-indent: 2.75rem;
  text-align: left;
  background-color: transparent;
  line-height: 4rem;
  padding-top: 0.5rem;
  top: 0; /*
background-image: linear-gradient(145deg,  transparent, rgba(0,0,0,0.035) );*/
}

[type="text"] {
  border-radius: 0 0 0;
}

[type="text"]:focus,
[type="password"]:focus {
  /* box-shadow:  0 -.15rem var(--brand);*/
  transition: box-shadow 0.4s ease;
  background-image: none;
  background-color: var(--bg);
  box-shadow: 0 .5rem .5rem -.4rem rgba(0,0,0,0.4)
}

[type="password"],
[type="password"] + label,
[type="password"] + label + small {
  right: 0;
}

[type="password"] + label + small + svg {
  left: 10.75rem;
}

/*
Portrait mode for phones and sidebars 
*/

@media screen and (max-width: 440px) {
  :root {
    font-size: 1rem;
  }

  form {
    min-height: 8rem;
    width: 10rem;
  }

  [type="submit"] {
    margin-top: 4rem; 
    position: relative; 
    height:3rem;
    line-height:3rem;
  }

  :valid ~ :valid ~ [type="submit"] {height:3rem; line-height:3rem;}
  [type="text"]:focus,
  [type="password"]:focus {
    box-shadow: 0 0.1em 0 var(--brand);
    z-index: 3;
  }

  [type="password"],
  [type="password"] + label,
  [type="password"] + label + small,
  [type="password"] + label + small + svg {
    top: 4rem;
  }

  [viewbox="0 0 10 10"] {
    left: 0.25rem;
  }

  [type="password"] + label + small + svg {
    left: 0.25rem;
    top: 5.5rem;
  }
}

@media (min-width: 300px) and (orientation: landscape) {
  .hbox {
    display: block !important;
    width: 100%;
    height: 4rem;
    top: 0;
    fill: none;
    stroke-width: 1;
    stroke: var(--mid);
    stroke-dasharray: 0 468;
    stroke-dashoffset: -96;
    transition: all 0.5s ease;
  }

  [type="text"]:focus ~ .hbox,
  [type="password"]:focus ~ .hbox {
    stroke-dasharray: 138 334;
    stroke-dashoffset: 42;
    stroke: var(--brand);
  }

  [type="submit"]:focus ~ .hbox {
    stroke-dashoffset: -300;
  }

  [type="password"]:focus ~ .hbox {
    stroke-dashoffset: -96;
  }

  /*field outline*/
}

small + svg {
  stroke: var(--mid);
  color: var(--mid);
}
input:focus + label + small + svg,
input:focus + label + small + svg use {
  stroke: var(--brand);
  color: var(--brand);
}
.fedora {
  fill: currentcolor !important;
}

/* icons*/

#burst {
  stroke: var(--mid);
}

#fed,
#user,
#lock,
#pad,
#burst,
[viewbox="0 0 10 10"] use {
  fill: transparent;
  stroke-width: 1px;
}
#fed {
  fill: currentcolor !important;
}
input + label + small + svg {
  text-align: left;
  z-index: 3;
  height: 1.25rem;
  width: 1.25rem;
  left: 0.5rem;
  top: 1.5rem;
}

.fedora {
  transform: translate(0, -1.5px);

  opacity: 0;
}

.lock {
  transform: translate(0, 0px);
}

[type="password"]:valid ~ svg .lock {
  transition: transform 0.5s ease;
  transform: translate(0, 1.25px);
}

input[type="text"]:valid ~ svg .fedora {
  transform: translate(0, -0.7px);
  transition: opacity 0.2s ease, transform 0.35s ease;
  opacity: 1;
}

svg use {
  fill: none;
}
#fed {
  fill: auto !important;
}

.logo {
  width: 100%;
  position: relative;
  margin: 1rem auto;
  width: 100%;
}
#brim {
  fill: var(--brand);
}
#type {
  fill: currentcolor;
}

.flash {
  stroke-dasharray: 1 5;
  stroke-dashoffset: -4;
  stroke-linecap: round;
  opacity: 0;
}

:focus + label + small + svg .flash {
  stroke-dashoffset: 1;
  transition: all 0.6s ease-out;
  opacity: 1;
  stroke-linecap: round;
}

[type="text"] {
  user-select: all;
}

.logo {
  height: 2.5rem;
}

/*helper objects */
.hbox {
  display: none;
}

@media (max-height: 300px) and (orientation: landscape) {
  body {
    overflow-y: auto;
  }

  .hbox {
    display: none;
  }
  form {
    .note,
    .logo {
      display: none;
    }
  }
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus {
  transition: background-color 50000s ease-in-out 50000s;
  font-family: "Red Hat Text", sans-serif !important;
  box-shadow: inset 0 0 0 10rem var(--bg); z-index:3;
}

input:-webkit-autofill:hover + label + small {
  display: none !important;
}

</style>
</head>

<body>
 
<svg xmlns="http://www.w3.org/2000/svg" class="logo" viewBox="0 0 850 240">
  <path id="brim" d="M230.2 110.6c.1-1.6-.1-3.1-.4-4.5l-9.6-41.5c-2.2-9.2-4.2-13.3-20.1-21.4-12.5-6.3-39.6-16.8-47.6-16.8-7.5 0-9.6 9.5-18.6 9.5-9 0-14.9-7-23.1-7-8.1 0-12.7 5.2-16.5 15.9 0 0-10.8 30.4-12.2 34.9a10 10 0 0 0-.3 2.5c0 11.8 45.8 50.7 109 50.7 16 0 39.4-3.2 39.4-22.3zm2.4 7.5a72 72 0 0 1 2.2 13c0 18-20.2 28-46.8 28-60 0-112.4-35.1-112.4-58.4 0-3.3.7-6.5 2-9.6C56.2 92.5 28 96.5 28 121c0 40.4 95.6 90.2 171.5 90.2 58 0 72.7-26.3 72.7-47.1 0-16.3-14-34.8-39.5-45.9"/>
  <path id="band" d="M232.7 118.2a58 58 0 0 1 2.2 13c0 18-20.2 28-46.8 28-60 0-112.5-35.1-112.5-58.4 0-3.3.6-6.5 2-9.6l4.6-11.4-.3 2.4c0 12 46.6 50.7 109 50.7 15.9 0 39.3-4.1 39.3-22.3 0-1.6-.1-3.1-.4-4.5z"/>
  <path id="type" d="M771.2 144.7c0 15.3 9.2 22.8 26 22.8a68 68 0 0 0 15.3-2.2v-17.7a31.8 31.8 0 0 1-9.9 1.5c-6.9 0-9.4-2.2-9.4-8.7v-27.2h20V95h-20V71.9l-22 4.7V95h-14.4v18.2h14.4v31.5zm-61.8 23c7.7 0 13.9-1.6 19.7-5.5v4.3h21.6v-45.8c0-17.5-11.7-27-31.3-27a79 79 0 0 0-33.4 7.8l7.8 16.1a57 57 0 0 1 21.7-5.7c9 0 13.6 3.5 13.6 10.7v3.5a61 61 0 0 0-16.2-2c-18.4 0-29.5 7.7-29.5 21.5 0 12.5 10 22.1 26 22.1zm-5.2-22.6c0-4.7 4.8-7 11.9-7 4.8 0 9.1.7 13 1.6v9.2c-4 2.3-8.8 3.4-13.6 3.4-7.1 0-11.3-2.7-11.3-7.2zm-112.4 21.4h23.3v-37H654v37h23.3V71.9H654v36.3h-38.9V71.9h-23.3v94.6zm-54.8 0h21.6V67.1L536.7 72v26.9a36.2 36.2 0 0 0-18.2-4.8 36.6 36.6 0 0 0-37.2 36.7 36.4 36.4 0 0 0 36.5 36.8 32 32 0 0 0 19.2-6.3v5.3zm-34.2-35.8a18 18 0 0 1 18.8-18.1c5.9 0 11.3 2 15.1 5.5v25c-3.9 3.8-9 5.7-15.1 5.7a18.1 18.1 0 0 1-18.8-18.1zm-101.3.1c0 20.8 17 37.1 38.9 37.1 12.1 0 20.8-3.3 29.9-10.9l-14.5-12.8a19.1 19.1 0 0 1-14.3 5.4c-8.1 0-14.7-4.5-17.6-11.3h51v-5.5c0-22.7-15.3-39-36.1-39-21 0-37.3 16.2-37.3 37zm36.9-19.2c6.9 0 12.7 4.5 15 11.4h-29.9c2.2-7.2 7.6-11.4 14.9-11.4zm-121 54.9h23.3V132h17.7l17.8 34.5h26l-20.7-37.8a29 29 0 0 0 17.7-26.7c0-17-13.4-30.1-33.4-30.1h-48.4v94.6zm46.3-74.8c7.7 0 12 5 12 10.7 0 5.8-4.3 10.7-12 10.7h-23V91.7h23z"/>
</svg>

  
<form 
id="login_form" 
name="login_form" 
autocomplete="off"
method="post"
enctype="application/x-www-form-urlencoded" 
onsubmit="javascript:stripspaces(this)" >
        
  
  
  
<input type="text"  
id="username" 
class="username"
name="username" 
size="20" 
autocapitalize="off"
autocorrect="off" 
autocomplete="on"  
autofocus="on"
required />


<label for="username">Username</label> <small>Red Hat ID</small>  <svg viewbox="0 0 10 10" ><use xlink:href="#user" /> <use xlink:href="#fed" class="fedora" /> <use xlink:href="#burst" class="flash"  /></svg>


<input 
   id="password" 
 type="password" 
 name="password"
autocorrect="off" 
autocomplete="off"  
autocomplete="new-password"
value=""  
size="20"
required>
 
<label for="password">Password</label> <small>PIN + Token</small> <svg viewbox="0 0 10 10"><use xlink:href="#pad" /><use class="flash" xlink:href="#burst" /><use class="lock" xlink:href="#lock" />
</svg>


  <button id="submit" type="submit" name="submit"  >Log In</button>
 
   
<span class="note" id="note">NOTE: You must close your browser or clear your cookies to completely log out.</span>
  
  
  <svg xmlns="http://www.w3.org/2000/svg" 
       class="hbox" viewBox="0 0 200 40">
      <rect  x=".5" y=".5" ry="3" rx="3" width="199" height="42" />
  </svg>
</form>



<svg class="hide">
  
    <defs>
   
   
 
      

  <g id="padlock"> <path id="pad" d="m 3,5.5 5,0 0,4 -5,0 z" /> <path id="lock" d="m 3,5.5 0,-2 c 0,-3 4,-3 4,-0.25 L 7,4 "/>  </g>
    
  <path id="fed" d="M7.8 3.8c-.7.6-3.5.6-4.4-.1-.3-.2 4.8-.2 4.4.1zM7 3.5c-.4-.7-.3-2-1.5-1.5-1-.5-1 .7-1.5 1.5"  />
      
  <path id="user" d="M5.5 5.8c-2 0-2-3 0-3 2.3 0 2 3 0 3zm.8-.3c1.2 0 2.2 1 2.2 2.3v1.7h-6V7.7c0-1.2 1-2.2 2.3-2.2"  />
  <path id="burst" d="m 5.47,0 v 2.19 m 4.38,2.19 h -2.2 m -6.55,0 H 3.28 M 2.38,1.28 3.92,2.83 M 8.56,1.28 7.02,2.83" />
    

  </defs>
</svg>

  


</body> 
<script>
</script>


