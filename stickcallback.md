Demo: https://jsfiddle.net/d0kwry83/3/
Code: 
```
<style>

.lb-widget-panel {
    display: block!important;
    position: fixed;
    bottom: 50px;
    right: 50px;
    pointer-events: none;
    font-size: 0
}

.lb-widget-panel--position-left {
    right: initial;
    left: 50px
}

.lb-widget-panel--position-right {
    right: 50px;
    left: initial
}

.lb-widget-panel__item {
    position: relative;
    display: inline-block;
    vertical-align: bottom;
    margin-left: 10px;
    pointer-events: auto;
    font-size: 16px;
    line-height: normal
}

.lb-widget-panel__item:first-child {
    margin-left: 0
}

.lb-widget-panel__item--hide {
    display: none
}


/*
==============================================
bigEntrance
==============================================
*/
.bigEntrance{
    -webkit-animation: bigEntrance 750ms linear both;
    -moz-animation-name: bigEntrance 750ms linear both;
    -o-animation-name: bigEntrance 750ms linear both;
    animation: bigEntrance 750ms linear both;

    visibility: visible !important;         
}
/*
==============================================
lb-pulse
==============================================
*/

.lb-pulse{
   /* -webkit-animation-name: lb-pulse;
    -moz-animation-name: lb-pulse;  
    -o-animation-name: lb-pulse;  
    animation-name: lb-pulse;
    
    -webkit-animation-duration: 1.5s;
    -moz-animation-duration: 1.5s;
    -o-animation-duration: 1.5s;
    animation-duration: 1.5s;   
    
    -webkit-animation-timing-function: ease-out;
    -moz-animation-timing-function: ease-out;  
    -o-animation-timing-function: ease-out;  
    animation-timing-function: ease-out;    
    
    -webkit-animation-iteration-count: infinite;
    -moz-animation-iteration-count: infinite;
    -o-animation-iteration-count: infinite;
    animation-iteration-count: infinite;*/
}

@-webkit-keyframes lb-pulse {
    0% {
        opacity: 1;
    }
    30% {
        -webkit-transform: scale(1.03) rotate(-2deg) translateX(0%) translateY(0%);        
        opacity: 1;
    }
    45% {
        -webkit-transform: scale(0.98) rotate(2deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
    60% {
        -webkit-transform: scale(1.03) rotate(-2deg) translateX(0%) translateY(0%);     
        opacity: 1;
    }   
    75% {
        -webkit-transform: scale(0.99) rotate(1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
    90% {
        -webkit-transform: scale(1.03) rotate(0deg) translateX(0%) translateY(0%);      
        opacity: 1;
    }   
    100% {
        -webkit-transform: scale(1) rotate(0deg) translateX(0%) translateY(0%);
        opacity: 1;
    }           
}
@-moz-keyframes lb-pulse {
    0% {
        opacity: 1;
    }
    30% {
        -moz-transform: scale(1.03) rotate(-2deg) translateX(0%) translateY(0%);        
        opacity: 1;
    }
    45% {
        -moz-transform: scale(0.98) rotate(2deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
    60% {
        -moz-transform: scale(1.03) rotate(-2deg) translateX(0%) translateY(0%);     
        opacity: 1;
    }   
    75% {
        -moz-transform: scale(0.99) rotate(1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
    90% {
        -moz-transform: scale(1.03) rotate(0deg) translateX(0%) translateY(0%);      
        opacity: 1;
    }   
    100% {
        -moz-transform: scale(1) rotate(0deg) translateX(0%) translateY(0%);
        opacity: 1;
    }           
}
@-o-keyframes lb-pulse {
    0% {
        opacity: 1;
    }
    30% {
        -o-transform: scale(1.03) rotate(-2deg) translateX(0%) translateY(0%);        
        opacity: 1;
    }
    45% {
        -o-transform: scale(0.98) rotate(2deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
    60% {
        -o-transform: scale(1.03) rotate(-2deg) translateX(0%) translateY(0%);     
        opacity: 1;
    }   
    75% {
        -o-transform: scale(0.99) rotate(1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
    90% {
        -o-transform: scale(1.03) rotate(0deg) translateX(0%) translateY(0%);      
        opacity: 1;
    }   
    100% {
        -o-transform: scale(1) rotate(0deg) translateX(0%) translateY(0%);
        opacity: 1;
    }           
}
@keyframes lb-pulse {
    0% {
        opacity: 1;
    }
    30% {
        transform: scale(1.03) rotate(-2deg) translateX(0%) translateY(0%);        
        opacity: 1;
    }
    45% {
        transform: scale(0.98) rotate(2deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
    60% {
        transform: scale(1.03) rotate(-2deg) translateX(0%) translateY(0%);     
        opacity: 1;
    }   
    75% {
        transform: scale(0.99) rotate(1deg) translateX(0%) translateY(0%);
        opacity: 1;
    }
    90% {
        transform: scale(1.03) rotate(0deg) translateX(0%) translateY(0%);      
        opacity: 1;
    }   
    100% {
        transform: scale(1) rotate(0deg) translateX(0%) translateY(0%);
        opacity: 1;
    }           
}

.phone-call_wave {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  border-radius: 50% !important;
}
.phone-call_wave__stroke {
  border: 2px solid #E74C3C;
  width: 90%;
  height: 90%;
  opacity: .9;
  -webkit-animation: wave-stroke 1.5s infinite cubic-bezier(.42, 0, .85, .75);
  -moz-animation: wave-stroke 1.5s infinite cubic-bezier(.42, 0, .85, .75);
  -o-animation: wave-stroke 1.5s infinite cubic-bezier(.42, 0, .85, .75);
  animation: wave-stroke 1.5s infinite cubic-bezier(.42, 0, .85, .75);
}
#lb_button-call:hover .phone-call_wave__stroke {
    -webkit-animation: none;
    animation: none;
}
/*    Волна без заливки*/
@-webkit-keyframes wave-stroke {
  100% {
    width: 200%;
    height: 200%;
    border-color: transparent;
    opacity: 0;
  }
}
@-moz-keyframes wave-stroke {
  100% {
    width: 200%;
    height: 200%;
    border-color: transparent;
    opacity: 0;
  }
}
@-o-keyframes wave-stroke {
  100% {
    width: 200%;
    height: 200%;
    border-color: transparent;
    opacity: 0;
  }
}
@keyframes wave-stroke {
  100% {
    width: 200%;
    height: 200%;
    border-color: transparent;
    opacity: 0;
  }
}
.lb_call-btn {
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8IURPQ1RZUEUgc3ZnICBQVUJMSUMgJy0vL1czQy8vRFREIFNWRyAxLjEvL0VOJyAgJ2h0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCc+CjxzdmcgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMTIwIDEyMCIgaGVpZ2h0PSIxMDBweCIgaWQ9IkxheWVyXzEiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDEyMCAxMjAiIHdpZHRoPSIxMDBweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgb3JpZ2luYWw9IiM0OGIxZjciPgoJPHN0eWxlPgoJQC13ZWJraXQta2V5ZnJhbWVzIHR3aXJsLXBob25lIHsKCTAlIHsKCgl9CgkzMCUgewoJLXdlYmtpdC10cmFuc2Zvcm06IHJvdGF0ZSgtNmRlZykgdHJhbnNsYXRlWSgtMXB4KTsKCX0KCTc1JSB7Cgktd2Via2l0LXRyYW5zZm9ybTogcm90YXRlKDVkZWcpIHRyYW5zbGF0ZVkoLTFweCk7Cgl9CgkxMDAlIHsKCS13ZWJraXQtdHJhbnNmb3JtOiByb3RhdGUoMGRlZykgdHJhbnNsYXRlWSgtMXB4KTsKCX0KCgl9CglALW1vei1rZXlmcmFtZXMgdHdpcmwtcGhvbmUgewoJMCUgewoKCX0KCTMwJSB7CgktbW96LXRyYW5zZm9ybTogcm90YXRlKC02ZGVnKSB0cmFuc2xhdGVZKC0xcHgpOwoJfQoJNzUlIHsKCS1tb3otdHJhbnNmb3JtOiByb3RhdGUoNWRlZykgdHJhbnNsYXRlWSgtMXB4KTsKCX0KCTEwMCUgewoJLW1vei10cmFuc2Zvcm06IHJvdGF0ZSgwZGVnKSB0cmFuc2xhdGVZKC0xcHgpOwoJfQoKCX0KCUAtby1rZXlmcmFtZXMgdHdpcmwtcGhvbmUgewoJMCUgewoKCX0KCTMwJSB7Cgktby10cmFuc2Zvcm06IHJvdGF0ZSgtNmRlZykgdHJhbnNsYXRlWSgtMXB4KTsKCX0KCTc1JSB7Cgktby10cmFuc2Zvcm06IHJvdGF0ZSg1ZGVnKSB0cmFuc2xhdGVZKC0xcHgpOwoJfQoJMTAwJSB7Cgktby10cmFuc2Zvcm06IHJvdGF0ZSgwZGVnKSB0cmFuc2xhdGVZKC0xcHgpOwoJfQoKCX0KCUBrZXlmcmFtZXMgdHdpcmwtcGhvbmUgewoJMCUgewoKCX0KCTMwJSB7Cgl0cmFuc2Zvcm06IHJvdGF0ZSgtNmRlZykgdHJhbnNsYXRlWSgtMXB4KTsKCX0KCTc1JSB7Cgl0cmFuc2Zvcm06IHJvdGF0ZSg1ZGVnKSB0cmFuc2xhdGVZKC0xcHgpOwoJfQoJMTAwJSB7Cgl0cmFuc2Zvcm06IHJvdGF0ZSgwZGVnKSB0cmFuc2xhdGVZKC0xcHgpOwoJfQoKCX0KCgkjbGJfcGhvbmUtaGVhZCB7Cgktd2Via2l0LXRyYW5zZm9ybS1vcmlnaW46IDUwJSA1MCU7Cgktd2Via2l0LWFuaW1hdGlvbjogdHdpcmwtcGhvbmUgMC41cyBhbHRlcm5hdGUgaW5maW5pdGUgbGluZWFyOwoKCS1tb3otdHJhbnNmb3JtLW9yaWdpbjogNTAlIDUwJTsKCS1tb3otYW5pbWF0aW9uOiB0d2lybC1waG9uZSAwLjVzIGFsdGVybmF0ZSBpbmZpbml0ZSBsaW5lYXI7CgoJLW8tdHJhbnNmb3JtLW9yaWdpbjogNTAlIDUwJTsKCS1vLWFuaW1hdGlvbjogdHdpcmwtcGhvbmUgMC41cyBhbHRlcm5hdGUgaW5maW5pdGUgbGluZWFyOwoKCXRyYW5zZm9ybS1vcmlnaW46IDUwJSA1MCU7CglhbmltYXRpb246IHR3aXJsLXBob25lIDAuNXMgYWx0ZXJuYXRlIGluZmluaXRlIGxpbmVhcjsKCgl9CgoJQC13ZWJraXQta2V5ZnJhbWVzIHdhdmUtc3Ryb2tlIHsKCTEwMCUgewoJb3BhY2l0eTogMDsKCX0KCX0KCUAtbW96LWtleWZyYW1lcyB3YXZlLXN0cm9rZSB7CgkxMDAlIHsKCW9wYWNpdHk6IDA7Cgl9Cgl9CglALW8ta2V5ZnJhbWVzIHdhdmUtc3Ryb2tlIHsKCTEwMCUgewoJb3BhY2l0eTogMDsKCX0KCX0KCUBrZXlmcmFtZXMgd2F2ZS1zdHJva2UgewoJMTAwJSB7CglvcGFjaXR5OiAwOwoJfQoJfQoKCS5sYl9waG9uZS13YXZlIHsKCS13ZWJraXQtYW5pbWF0aW9uOiB3YXZlLXN0cm9rZSAxcyBhbHRlcm5hdGUgaW5maW5pdGUgbGluZWFyOwoJLW1vei1hbmltYXRpb246IHdhdmUtc3Ryb2tlIDFzIGFsdGVybmF0ZSBpbmZpbml0ZSBsaW5lYXI7Cgktby1hbmltYXRpb246IHdhdmUtc3Ryb2tlIDFzIGFsdGVybmF0ZSBpbmZpbml0ZSBsaW5lYXI7CglhbmltYXRpb246IHR3aXJsLXBob25lIDFzIGFsdGVybmF0ZSBpbmZpbml0ZSBsaW5lYXI7CgoJfQoKCS5kZWxheTEgewoJLXdlYmtpdC1hbmltYXRpb24tZGVsYXk6IDAuMzNzOwoJLW1vei1hbmltYXRpb24tZGVsYXk6IDAuMzNzOwoJLW1zLWFuaW1hdGlvbi1kZWxheTogMC4zM3M7Cgktby1hbmltYXRpb24tZGVsYXk6IDAuMzNzOwoJYW5pbWF0aW9uLWRlbGF5OiAwLjMzczsKCX0KCS5kZWxheTIgewoJLXdlYmtpdC1hbmltYXRpb24tZGVsYXk6IDAuNjZzOwoJLW1vei1hbmltYXRpb24tZGVsYXk6IDAuNjZzOwoJLW1zLWFuaW1hdGlvbi1kZWxheTogMC42NnM7Cgktby1hbmltYXRpb24tZGVsYXk6IDAuNjZzOwoJYW5pbWF0aW9uLWRlbGF5OiAwLjY2czsKCX0KCTwvc3R5bGU+Cgk8Y2lyY2xlIGN4PSI2MC4wMDEiIGN5PSI2MCIgZmlsbD0iI0U3NEMzQyIgcj0iNTUuOTkzIiBpZD0iZmlsbC1iYWNrZ3JvdW5kIi8+Cgk8cGF0aCBkPSJNOTkuMjEyLDk5Ljk1NUw5My4wNSw3OC45NTNsLTMwLjY3OCwyLjQ0M0wzMy45OTMsNTkuMDA2bDE2LjQ3OCw1Ni4xNjJjMy4wOTgsMC41MzEsNi4yNzgsMC44MjQsOS41MywwLjgyNCAgQzc1LjI3MywxMTUuOTkyLDg5LjExMSwxMDkuODcxLDk5LjIxMiw5OS45NTV6IiBmaWxsPSIjMDAwMDAwIiBvcGFjaXR5PSIwLjA3IiAvPgoJPGcgaWQ9ImxiX3Bob25lLWhlYWQiPgoJCTxwYXRoIGQ9Ik05Mi44OTQsODEuMTk3Yy0wLjU1NywyLjU0My0zLjQ0Nyw4LjcwOC02LjE5OSw5LjM0M2MtMi4zMywwLjUzOS00Ljc1NCwwLjgxMi03LjIxOSwwLjgxMiAgIEM2Niw5MS4zMzIsNTEuMzExLDgzLjI5Nyw0MS4xMDksNzAuMzQ2QzMyLjE1OCw1OC45NTksMjguNTM3LDQ2LjA3LDMxLjIxMywzNC45OWMwLjY5Mi0yLjg3LDcuNjk5LTYuMzM4LDEwLjc2Mi02LjMzOCAgIGMxLjQyMywwLDIuMTk1LDAuNjE0LDIuNTk5LDEuMTM3YzAuNDI0LDAuNTU5LDcuODU1LDExLjg4OSw4LjI3NywxMi42MjJjMS42MTksMi43OTMtMS4xNzYsNC42NjEtMi44NjcsNS43OTcgICBjLTIuOTI4LDEuOTQ4LTUuNjc4LDMuNzk2LTMuMTM3LDkuMTUyYzAuMDM3LDAuMDgsMi44MDksNS45OTQsNy4yOTMsMTAuMjM0YzQuMzEzLDQuNTY2LDEwLjE4NSw3LjMwMywxMC4yNDMsNy4zNCAgIGMxLjM2OSwwLjYzNywyLjU0MSwwLjk2NSwzLjU0NSwwLjk2NWMyLjI1LDAsMy40MjYtMS41ODQsNC45ODItNC4wMWMxLjEzNS0xLjc3MSwyLjMxMS0zLjU4Miw0LjQzLTMuNTgyICAgYzAuNzExLDAsMS40MDYsMC4yMTEsMi4wNzgsMC42NTRjMC4xMTcsMC4wNzYsMTEuOTM4LDcuNzg1LDEyLjQ5NCw4LjIwOUM5Mi45NTMsNzcuOTYxLDkzLjI3OSw3OS4zMTEsOTIuODk0LDgxLjE5N3oiIGZpbGw9IiNGRkZGRkYiLz4KCTwvZz4KPC9zdmc+) no-repeat scroll center center transparent!important;
    background-size: contain!important;
    width: 80px;
    height: 80px;
    opacity: 0.7;
    z-index: 100000;
    cursor: pointer;

    visibility: hidden;

    -moz-transition-duration: 1s;
    -o-transition-duration: 1s;
    -webkit-transition-duration: 1s;
    transition-duration: 1s;
}
.lb_call-btn:hover {
    opacity: 1!important;
}

/* tooltip */
.lb_button_tooltip--container {
    font-family: 'Open Sans', sans-serif !important;
    top: 50%!important;
    transform: translateY(-50%)!important;

    bottom: 0!important;
    display: table!important;

    position: absolute!important;

    z-index: 501!important;
}
.lb_button_tooltip--container.lb_button_tooltip--left {
    right: auto!important;
    left: -206px!important;
}
.lb_button_tooltip--container.lb_button_tooltip--right {
    right: -206px!important;
    left: auto!important;
}
.lb_button_tooltip {
    font-size: 13px!important;

    line-height: normal!important;
    
    width: 190px!important;
    height: auto!important;
    min-height: 54px!important;

    padding: 10px!important;
    text-align: left!important;
    vertical-align: middle!important;
    opacity: 0!important; 
    border-radius: 5px!important;
    background: rgba(0,0,0,.8)!important;
    box-shadow: 0 1px 3px rgba(0,0,0,.2)!important;

    cursor: pointer!important;
    outline: 0!important;

    box-sizing: border-box!important;
    
    font-weight: 100;
    -webkit-font-smoothing: subpixel-antialiased;
}
.lb_button_tooltip.lb_button_tooltip--show {
    opacity: 1!important;
    display: table!important;
    -webkit-animation: lb-tooltip-animation 1000ms linear both;
    animation: lb-tooltip-animation 1000ms linear both;
}
.lb_button_tooltip.lb_button_tooltip--show.lb_button_tooltip--alert {
    opacity: 1!important;
    display: table!important;
    -webkit-animation: lb-tooltip-animation-alert 3800ms linear infinite both;
    animation: lb-tooltip-animation-alert 3800ms linear infinite both;
}
.lb_button_tooltip.lb_button_tooltip--hide {
    opacity: 0!important;
    display: none!important;
    -webkit-animation:none;
    animation: none;
}
#lb_button-call:hover .lb_button_tooltip.lb_button_tooltip--hide.lb_button_tooltip--hover {
    opacity: .95!important;
    display: table!important;
    transition: all 0.5s ease!important;
}
#lb_button-call:hover .lb_button_tooltip.lb_button_tooltip--hide.lb_button_tooltip--hover .lb_button_tooltip--close {
    display: none!important;
}
#lb_button-call:hover .lb_button_tooltip.lb_button_tooltip--alert {
    opacity: 1!important;
    display: table!important;
    -webkit-animation: none;
    animation: none;
}
.lb_button_tooltip--text {
    font-size: 13px!important;
    font-weight: 100;
    -webkit-font-smoothing: subpixel-antialiased;
    line-height: 1.3em!important;
    color: #fff!important;
    display: table-cell!important;
    vertical-align: middle!important;
    word-break: break-word;
    text-overflow: ellipsis;
}
.lb_button_tooltip--close {
    transition: all 1s!important;

    color: #000!important;
    font-size: 15px!important;
    font-weight: 300!important;
    line-height: 40px!important;
    position: absolute!important;
    opacity: .6!important;
    top: -30px!important;
    right: -10px!important;
}
.lb_button_tooltip::before {
    top: 50%!important;
    transform: translateY(-50%)!important;
    right: -16px!important;
    bottom: auto!important;
    left: auto!important;
    border-top-color: transparent!important;
    border-right-color: transparent!important;
    border-bottom-color: transparent!important;
    border-left-color: rgba(0,0,0,.8)!important;

    margin: 0!important;
    border-width: 8px!important;
    border-style: solid!important;
    border-top-color: transparent!important;
    border-bottom-color: transparent!important;

    position: absolute!important;
    z-index: 500!important;
    content: ''!important;
    background: 0 0!important;

    box-sizing: border-box!important;
}
.lb_button_tooltip::before {
    top: 50%!important;
    transform: translateY(-50%)!important;
    bottom: auto!important;
    border-top-color: transparent!important;
    border-bottom-color: transparent!important;

    margin: 0!important;
    border-width: 8px!important;
    border-style: solid!important;
    border-top-color: transparent!important;
    border-bottom-color: transparent!important;

    position: absolute!important;
    z-index: 500!important;
    content: ''!important;
    background: 0 0!important;

    box-sizing: border-box!important;
}
.lb_button_tooltip--container.lb_button_tooltip--left .lb_button_tooltip::before {
    left: auto!important;
    right: -16px!important;
    border-right-color: transparent!important;
    border-left-color: rgba(0,0,0,.8)!important;
}
.lb_button_tooltip--container.lb_button_tooltip--right .lb_button_tooltip::before {
    left: -16px!important;
    right: auto!important;
    border-left-color: transparent!important;
    border-right-color: rgba(0,0,0,.8)!important;
}
/* Generated with Bounce.js. Edit at https://goo.gl/7OdlWP */
@-webkit-keyframes lb-tooltip-animation { 
  0% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -500, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -500, 0, 0, 1); }
  1.78% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.621, 1, 0, 0, 0, 0, 1, 0, -282.728, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.621, 1, 0, 0, 0, 0, 1, 0, -282.728, 0, 0, 1); }
  3.56% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.829, 1, 0, 0, 0, 0, 1, 0, -149.309, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.829, 1, 0, 0, 0, 0, 1, 0, -149.309, 0, 0, 1); }
  5.34% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.695, 1, 0, 0, 0, 0, 1, 0, -72.484, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.695, 1, 0, 0, 0, 0, 1, 0, -72.484, 0, 0, 1); }
  7.06% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.477, 1, 0, 0, 0, 0, 1, 0, -31.997, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.477, 1, 0, 0, 0, 0, 1, 0, -31.997, 0, 0, 1); }
  7.12% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.47, 1, 0, 0, 0, 0, 1, 0, -31.079, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.47, 1, 0, 0, 0, 0, 1, 0, -31.079, 0, 0, 1); }
  10.51% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.146, 1, 0, 0, 0, 0, 1, 0, -1.766, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.146, 1, 0, 0, 0, 0, 1, 0, -1.766, 0, 0, 1); }
  10.68% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.135, 1, 0, 0, 0, 0, 1, 0, -1.214, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.135, 1, 0, 0, 0, 0, 1, 0, -1.214, 0, 0, 1); }
  14.01% { -webkit-transform: matrix3d(1, 0, 0, 0, -0.003, 1, 0, 0, 0, 0, 1, 0, 2.88, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, -0.003, 1, 0, 0, 0, 0, 1, 0, 2.88, 0, 0, 1); }
  14.24% { -webkit-transform: matrix3d(1, 0, 0, 0, -0.007, 1, 0, 0, 0, 0, 1, 0, 2.886, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, -0.007, 1, 0, 0, 0, 0, 1, 0, 2.886, 0, 0, 1); }
  17.46% { -webkit-transform: matrix3d(1, 0, 0, 0, -0.033, 1, 0, 0, 0, 0, 1, 0, 1.99, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, -0.033, 1, 0, 0, 0, 0, 1, 0, 1.99, 0, 0, 1); }
  31.36% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.002, 1, 0, 0, 0, 0, 1, 0, 0.01, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.002, 1, 0, 0, 0, 0, 1, 0, 0.01, 0, 0, 1); }
  36.48% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, -0.003, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, -0.003, 0, 0, 1); }
  44.34% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.001, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.001, 0, 0, 1); }
  44.44% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.001, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.001, 0, 0, 1); }
  45.27% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -7.992, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -7.992, 0, 1); }
  46.45% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.001, -15.312, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.001, -15.312, 0, 1); }
  48.45% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.001, -19.275, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.001, -19.275, 0, 1); }
  50.95% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -15.606, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -15.606, 0, 1); }
  53.4% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -9.111, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -9.111, 0, 1); }
  55.56% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -4.058, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -4.058, 0, 1); }
  55.9% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -3.395, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -3.395, 0, 1); }
  58.35% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.013, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.013, 0, 1); }
  62.35% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -1.622, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -1.622, 0, 1); }
  72.25% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.002, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.002, 0, 1); }
  76.25% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.137, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.137, 0, 1); }
  86.15% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  90.16% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.011, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.011, 0, 1); }
  100% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
@keyframes lb-tooltip-animation { 
  0% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -500, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -500, 0, 0, 1); }
  1.78% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.621, 1, 0, 0, 0, 0, 1, 0, -282.728, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.621, 1, 0, 0, 0, 0, 1, 0, -282.728, 0, 0, 1); }
  3.56% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.829, 1, 0, 0, 0, 0, 1, 0, -149.309, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.829, 1, 0, 0, 0, 0, 1, 0, -149.309, 0, 0, 1); }
  5.34% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.695, 1, 0, 0, 0, 0, 1, 0, -72.484, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.695, 1, 0, 0, 0, 0, 1, 0, -72.484, 0, 0, 1); }
  7.06% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.477, 1, 0, 0, 0, 0, 1, 0, -31.997, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.477, 1, 0, 0, 0, 0, 1, 0, -31.997, 0, 0, 1); }
  7.12% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.47, 1, 0, 0, 0, 0, 1, 0, -31.079, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.47, 1, 0, 0, 0, 0, 1, 0, -31.079, 0, 0, 1); }
  10.51% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.146, 1, 0, 0, 0, 0, 1, 0, -1.766, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.146, 1, 0, 0, 0, 0, 1, 0, -1.766, 0, 0, 1); }
  10.68% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.135, 1, 0, 0, 0, 0, 1, 0, -1.214, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.135, 1, 0, 0, 0, 0, 1, 0, -1.214, 0, 0, 1); }
  14.01% { -webkit-transform: matrix3d(1, 0, 0, 0, -0.003, 1, 0, 0, 0, 0, 1, 0, 2.88, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, -0.003, 1, 0, 0, 0, 0, 1, 0, 2.88, 0, 0, 1); }
  14.24% { -webkit-transform: matrix3d(1, 0, 0, 0, -0.007, 1, 0, 0, 0, 0, 1, 0, 2.886, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, -0.007, 1, 0, 0, 0, 0, 1, 0, 2.886, 0, 0, 1); }
  17.46% { -webkit-transform: matrix3d(1, 0, 0, 0, -0.033, 1, 0, 0, 0, 0, 1, 0, 1.99, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, -0.033, 1, 0, 0, 0, 0, 1, 0, 1.99, 0, 0, 1); }
  31.36% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.002, 1, 0, 0, 0, 0, 1, 0, 0.01, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.002, 1, 0, 0, 0, 0, 1, 0, 0.01, 0, 0, 1); }
  36.48% { -webkit-transform: matrix3d(1, 0, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, -0.003, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, -0.003, 0, 0, 1); }
  44.34% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.001, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.001, 0, 0, 1); }
  44.44% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.001, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.001, 0, 0, 1); }
  45.27% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -7.992, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -7.992, 0, 1); }
  46.45% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.001, -15.312, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.001, -15.312, 0, 1); }
  48.45% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.001, -19.275, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.001, -19.275, 0, 1); }
  50.95% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -15.606, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -15.606, 0, 1); }
  53.4% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -9.111, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -9.111, 0, 1); }
  55.56% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -4.058, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -4.058, 0, 1); }
  55.9% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -3.395, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -3.395, 0, 1); }
  58.35% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.013, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.013, 0, 1); }
  62.35% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -1.622, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -1.622, 0, 1); }
  72.25% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.002, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.002, 0, 1); }
  76.25% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.137, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.137, 0, 1); }
  86.15% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  90.16% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.011, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.011, 0, 1); }
  100% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
/* Generated with Bounce.js. Edit at https://goo.gl/QDxnFc */
@-webkit-keyframes lb-tooltip-animation-hover { 
  0% { -webkit-transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  2.77% { -webkit-transform: matrix3d(0.625, 0, 0, 0, 0, 0.703, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.625, 0, 0, 0, 0, 0.703, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  4.7% { -webkit-transform: matrix3d(0.725, 0, 0, 0, 0, 0.878, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.725, 0, 0, 0, 0, 0.878, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  5.53% { -webkit-transform: matrix3d(0.767, 0, 0, 0, 0, 0.946, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.767, 0, 0, 0, 0, 0.946, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  8.3% { -webkit-transform: matrix3d(0.897, 0, 0, 0, 0, 1.113, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.897, 0, 0, 0, 0, 1.113, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  9.41% { -webkit-transform: matrix3d(0.942, 0, 0, 0, 0, 1.148, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.942, 0, 0, 0, 0, 1.148, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  11.06% { -webkit-transform: matrix3d(0.998, 0, 0, 0, 0, 1.166, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.998, 0, 0, 0, 0, 1.166, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  14.11% { -webkit-transform: matrix3d(1.07, 0, 0, 0, 0, 1.123, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.07, 0, 0, 0, 0, 1.123, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  14.23% { -webkit-transform: matrix3d(1.072, 0, 0, 0, 0, 1.12, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.072, 0, 0, 0, 0, 1.12, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  17.32% { -webkit-transform: matrix3d(1.103, 0, 0, 0, 0, 1.035, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.103, 0, 0, 0, 0, 1.035, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  18.72% { -webkit-transform: matrix3d(1.106, 0, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.106, 0, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  20.5% { -webkit-transform: matrix3d(1.102, 0, 0, 0, 0, 0.969, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.102, 0, 0, 0, 0, 0.969, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  23.59% { -webkit-transform: matrix3d(1.082, 0, 0, 0, 0, 0.948, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.082, 0, 0, 0, 0, 0.948, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  24.32% { -webkit-transform: matrix3d(1.075, 0, 0, 0, 0, 0.949, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.075, 0, 0, 0, 0, 0.949, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.85% { -webkit-transform: matrix3d(1.024, 0, 0, 0, 0, 0.989, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.024, 0, 0, 0, 0, 0.989, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.93% { -webkit-transform: matrix3d(1.024, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.024, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  35.54% { -webkit-transform: matrix3d(0.99, 0, 0, 0, 0, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.99, 0, 0, 0, 0, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  36.11% { -webkit-transform: matrix3d(0.988, 0, 0, 0, 0, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.988, 0, 0, 0, 0, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  41.04% { -webkit-transform: matrix3d(0.98, 0, 0, 0, 0, 1.007, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.98, 0, 0, 0, 0, 1.007, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  48.64% { -webkit-transform: matrix3d(0.99, 0, 0, 0, 0, 0.995, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.99, 0, 0, 0, 0, 0.995, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  52.15% { -webkit-transform: matrix3d(0.996, 0, 0, 0, 0, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.996, 0, 0, 0, 0, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  61.16% { -webkit-transform: matrix3d(1.003, 0, 0, 0, 0, 1.002, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.003, 0, 0, 0, 0, 1.002, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  63.26% { -webkit-transform: matrix3d(1.004, 0, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.004, 0, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  73.69% { -webkit-transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  81.25% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  85.49% { -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  100% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
@keyframes lb-tooltip-animation-hover { 
  0% { -webkit-transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  2.77% { -webkit-transform: matrix3d(0.625, 0, 0, 0, 0, 0.703, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.625, 0, 0, 0, 0, 0.703, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  4.7% { -webkit-transform: matrix3d(0.725, 0, 0, 0, 0, 0.878, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.725, 0, 0, 0, 0, 0.878, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  5.53% { -webkit-transform: matrix3d(0.767, 0, 0, 0, 0, 0.946, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.767, 0, 0, 0, 0, 0.946, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  8.3% { -webkit-transform: matrix3d(0.897, 0, 0, 0, 0, 1.113, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.897, 0, 0, 0, 0, 1.113, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  9.41% { -webkit-transform: matrix3d(0.942, 0, 0, 0, 0, 1.148, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.942, 0, 0, 0, 0, 1.148, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  11.06% { -webkit-transform: matrix3d(0.998, 0, 0, 0, 0, 1.166, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.998, 0, 0, 0, 0, 1.166, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  14.11% { -webkit-transform: matrix3d(1.07, 0, 0, 0, 0, 1.123, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.07, 0, 0, 0, 0, 1.123, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  14.23% { -webkit-transform: matrix3d(1.072, 0, 0, 0, 0, 1.12, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.072, 0, 0, 0, 0, 1.12, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  17.32% { -webkit-transform: matrix3d(1.103, 0, 0, 0, 0, 1.035, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.103, 0, 0, 0, 0, 1.035, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  18.72% { -webkit-transform: matrix3d(1.106, 0, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.106, 0, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  20.5% { -webkit-transform: matrix3d(1.102, 0, 0, 0, 0, 0.969, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.102, 0, 0, 0, 0, 0.969, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  23.59% { -webkit-transform: matrix3d(1.082, 0, 0, 0, 0, 0.948, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.082, 0, 0, 0, 0, 0.948, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  24.32% { -webkit-transform: matrix3d(1.075, 0, 0, 0, 0, 0.949, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.075, 0, 0, 0, 0, 0.949, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.85% { -webkit-transform: matrix3d(1.024, 0, 0, 0, 0, 0.989, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.024, 0, 0, 0, 0, 0.989, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.93% { -webkit-transform: matrix3d(1.024, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.024, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  35.54% { -webkit-transform: matrix3d(0.99, 0, 0, 0, 0, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.99, 0, 0, 0, 0, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  36.11% { -webkit-transform: matrix3d(0.988, 0, 0, 0, 0, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.988, 0, 0, 0, 0, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  41.04% { -webkit-transform: matrix3d(0.98, 0, 0, 0, 0, 1.007, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.98, 0, 0, 0, 0, 1.007, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  48.64% { -webkit-transform: matrix3d(0.99, 0, 0, 0, 0, 0.995, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.99, 0, 0, 0, 0, 0.995, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  52.15% { -webkit-transform: matrix3d(0.996, 0, 0, 0, 0, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.996, 0, 0, 0, 0, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  61.16% { -webkit-transform: matrix3d(1.003, 0, 0, 0, 0, 1.002, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.003, 0, 0, 0, 0, 1.002, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  63.26% { -webkit-transform: matrix3d(1.004, 0, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.004, 0, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  73.69% { -webkit-transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  81.25% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  85.49% { -webkit-transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  100% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
/* Generated with Bounce.js. Edit at https://goo.gl/58h9nG */
@-webkit-keyframes lb-tooltip-animation-alert { 
  0% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  74.9% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  75% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  75.6% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -18.81, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -18.81, 0, 1); }
  76.2% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -24.248, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -24.248, 0, 1); }
  76.8% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -20.782, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -20.782, 0, 1); }
  77.4% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -13.285, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -13.285, 0, 1); }
  78.58% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.055, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.055, 0, 1); }
  79.78% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -4.256, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -4.256, 0, 1); }
  82.16% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.019, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.019, 0, 1); }
  83.36% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.747, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.747, 0, 1); }
  85.74% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.005, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.005, 0, 1); }
  86.94% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.131, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.131, 0, 1); }
  89.29% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  90.52% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.023, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.023, 0, 1); }
  92.87% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  94.09% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.004, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.004, 0, 1); }
  96.45% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  97.67% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.001, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.001, 0, 1); }
  100% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
@keyframes lb-tooltip-animation-alert { 
  0% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  74.9% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  75% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  75.6% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -18.81, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -18.81, 0, 1); }
  76.2% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -24.248, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -24.248, 0, 1); }
  76.8% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -20.782, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -20.782, 0, 1); }
  77.4% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -13.285, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -13.285, 0, 1); }
  78.58% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.055, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.055, 0, 1); }
  79.78% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -4.256, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -4.256, 0, 1); }
  82.16% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.019, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.019, 0, 1); }
  83.36% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.747, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.747, 0, 1); }
  85.74% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.005, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.005, 0, 1); }
  86.94% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.131, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.131, 0, 1); }
  89.29% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  90.52% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.023, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.023, 0, 1); }
  92.87% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  94.09% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.004, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.004, 0, 1); }
  96.45% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  97.67% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.001, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -0.001, 0, 1); }
  100% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
/* Generated with Bounce.js. Edit at https://goo.gl/335BE4 */
@-webkit-keyframes bigEntrance { 
  0% { -webkit-transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  3.2% { -webkit-transform: matrix3d(0.673, 0.192, 0, 0, 0.126, 0.673, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.673, 0.192, 0, 0, 0.126, 0.673, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  4.5% { -webkit-transform: matrix3d(0.743, 0.25, 0, 0, 0.163, 0.743, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.743, 0.25, 0, 0, 0.163, 0.743, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  6.41% { -webkit-transform: matrix3d(0.836, 0.301, 0, 0, 0.196, 0.836, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.836, 0.301, 0, 0, 0.196, 0.836, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  9.01% { -webkit-transform: matrix3d(0.94, 0.308, 0, 0, 0.201, 0.94, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.94, 0.308, 0, 0, 0.201, 0.94, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  12.71% { -webkit-transform: matrix3d(1.032, 0.234, 0, 0, 0.154, 1.032, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.032, 0.234, 0, 0, 0.154, 1.032, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  13.51% { -webkit-transform: matrix3d(1.044, 0.212, 0, 0, 0.14, 1.044, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.044, 0.212, 0, 0, 0.14, 1.044, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  17.92% { -webkit-transform: matrix3d(1.07, 0.098, 0, 0, 0.066, 1.07, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.07, 0.098, 0, 0, 0.066, 1.07, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  18.92% { -webkit-transform: matrix3d(1.069, 0.077, 0, 0, 0.052, 1.069, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.069, 0.077, 0, 0, 0.052, 1.069, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  25.23% { -webkit-transform: matrix3d(1.038, -0.001, 0, 0, -0.001, 1.038, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.038, -0.001, 0, 0, -0.001, 1.038, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.03% { -webkit-transform: matrix3d(1.016, -0.015, 0, 0, -0.01, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.016, -0.015, 0, 0, -0.01, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  31.43% { -webkit-transform: matrix3d(1.006, -0.017, 0, 0, -0.011, 1.006, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.006, -0.017, 0, 0, -0.011, 1.006, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  34.63% { -webkit-transform: matrix3d(0.997, -0.014, 0, 0, -0.01, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.997, -0.014, 0, 0, -0.01, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  40.14% { -webkit-transform: matrix3d(0.992, -0.007, 0, 0, -0.005, 0.992, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.992, -0.007, 0, 0, -0.005, 0.992, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  56.46% { -webkit-transform: matrix3d(1, 0.001, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0.001, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  62.36% { -webkit-transform: matrix3d(1.001, 0.001, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.001, 0.001, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  81.48% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  84.68% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  100% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
@-moz-keyframes bigEntrance { 
  0% { -moz-transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  3.2% { -moz-transform: matrix3d(0.673, 0.192, 0, 0, 0.126, 0.673, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.673, 0.192, 0, 0, 0.126, 0.673, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  4.5% { -moz-transform: matrix3d(0.743, 0.25, 0, 0, 0.163, 0.743, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.743, 0.25, 0, 0, 0.163, 0.743, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  6.41% { -moz-transform: matrix3d(0.836, 0.301, 0, 0, 0.196, 0.836, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.836, 0.301, 0, 0, 0.196, 0.836, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  9.01% { -moz-transform: matrix3d(0.94, 0.308, 0, 0, 0.201, 0.94, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.94, 0.308, 0, 0, 0.201, 0.94, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  12.71% { -moz-transform: matrix3d(1.032, 0.234, 0, 0, 0.154, 1.032, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.032, 0.234, 0, 0, 0.154, 1.032, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  13.51% { -moz-transform: matrix3d(1.044, 0.212, 0, 0, 0.14, 1.044, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.044, 0.212, 0, 0, 0.14, 1.044, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  17.92% { -moz-transform: matrix3d(1.07, 0.098, 0, 0, 0.066, 1.07, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.07, 0.098, 0, 0, 0.066, 1.07, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  18.92% { -moz-transform: matrix3d(1.069, 0.077, 0, 0, 0.052, 1.069, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.069, 0.077, 0, 0, 0.052, 1.069, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  25.23% { -moz-transform: matrix3d(1.038, -0.001, 0, 0, -0.001, 1.038, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.038, -0.001, 0, 0, -0.001, 1.038, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.03% { -moz-transform: matrix3d(1.016, -0.015, 0, 0, -0.01, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.016, -0.015, 0, 0, -0.01, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  31.43% { -moz-transform: matrix3d(1.006, -0.017, 0, 0, -0.011, 1.006, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.006, -0.017, 0, 0, -0.011, 1.006, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  34.63% { -moz-transform: matrix3d(0.997, -0.014, 0, 0, -0.01, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.997, -0.014, 0, 0, -0.01, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  40.14% { -moz-transform: matrix3d(0.992, -0.007, 0, 0, -0.005, 0.992, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.992, -0.007, 0, 0, -0.005, 0.992, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  56.46% { -moz-transform: matrix3d(1, 0.001, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0.001, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  62.36% { -moz-transform: matrix3d(1.001, 0.001, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.001, 0.001, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  81.48% { -moz-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  84.68% { -moz-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  100% { -moz-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
@-o-keyframes bigEntrance { 
  0% { -o-transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  3.2% { -o-transform: matrix3d(0.673, 0.192, 0, 0, 0.126, 0.673, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.673, 0.192, 0, 0, 0.126, 0.673, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  4.5% { -o-transform: matrix3d(0.743, 0.25, 0, 0, 0.163, 0.743, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.743, 0.25, 0, 0, 0.163, 0.743, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  6.41% { -o-transform: matrix3d(0.836, 0.301, 0, 0, 0.196, 0.836, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.836, 0.301, 0, 0, 0.196, 0.836, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  9.01% { -o-transform: matrix3d(0.94, 0.308, 0, 0, 0.201, 0.94, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.94, 0.308, 0, 0, 0.201, 0.94, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  12.71% { -o-transform: matrix3d(1.032, 0.234, 0, 0, 0.154, 1.032, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.032, 0.234, 0, 0, 0.154, 1.032, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  13.51% { -o-transform: matrix3d(1.044, 0.212, 0, 0, 0.14, 1.044, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.044, 0.212, 0, 0, 0.14, 1.044, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  17.92% { -o-transform: matrix3d(1.07, 0.098, 0, 0, 0.066, 1.07, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.07, 0.098, 0, 0, 0.066, 1.07, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  18.92% { -o-transform: matrix3d(1.069, 0.077, 0, 0, 0.052, 1.069, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.069, 0.077, 0, 0, 0.052, 1.069, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  25.23% { -o-transform: matrix3d(1.038, -0.001, 0, 0, -0.001, 1.038, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.038, -0.001, 0, 0, -0.001, 1.038, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.03% { -o-transform: matrix3d(1.016, -0.015, 0, 0, -0.01, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.016, -0.015, 0, 0, -0.01, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  31.43% { -o-transform: matrix3d(1.006, -0.017, 0, 0, -0.011, 1.006, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.006, -0.017, 0, 0, -0.011, 1.006, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  34.63% { -o-transform: matrix3d(0.997, -0.014, 0, 0, -0.01, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.997, -0.014, 0, 0, -0.01, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  40.14% { -o-transform: matrix3d(0.992, -0.007, 0, 0, -0.005, 0.992, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.992, -0.007, 0, 0, -0.005, 0.992, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  56.46% { -o-transform: matrix3d(1, 0.001, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0.001, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  62.36% { -o-transform: matrix3d(1.001, 0.001, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.001, 0.001, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  81.48% { -o-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  84.68% { -o-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  100% { -o-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}
@keyframes bigEntrance { 
  0% { -webkit-transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.5, 0, 0, 0, 0, 0.5, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  3.2% { -webkit-transform: matrix3d(0.673, 0.192, 0, 0, 0.126, 0.673, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.673, 0.192, 0, 0, 0.126, 0.673, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  4.5% { -webkit-transform: matrix3d(0.743, 0.25, 0, 0, 0.163, 0.743, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.743, 0.25, 0, 0, 0.163, 0.743, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  6.41% { -webkit-transform: matrix3d(0.836, 0.301, 0, 0, 0.196, 0.836, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.836, 0.301, 0, 0, 0.196, 0.836, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  9.01% { -webkit-transform: matrix3d(0.94, 0.308, 0, 0, 0.201, 0.94, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.94, 0.308, 0, 0, 0.201, 0.94, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  12.71% { -webkit-transform: matrix3d(1.032, 0.234, 0, 0, 0.154, 1.032, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.032, 0.234, 0, 0, 0.154, 1.032, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  13.51% { -webkit-transform: matrix3d(1.044, 0.212, 0, 0, 0.14, 1.044, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.044, 0.212, 0, 0, 0.14, 1.044, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  17.92% { -webkit-transform: matrix3d(1.07, 0.098, 0, 0, 0.066, 1.07, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.07, 0.098, 0, 0, 0.066, 1.07, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  18.92% { -webkit-transform: matrix3d(1.069, 0.077, 0, 0, 0.052, 1.069, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.069, 0.077, 0, 0, 0.052, 1.069, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  25.23% { -webkit-transform: matrix3d(1.038, -0.001, 0, 0, -0.001, 1.038, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.038, -0.001, 0, 0, -0.001, 1.038, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  29.03% { -webkit-transform: matrix3d(1.016, -0.015, 0, 0, -0.01, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.016, -0.015, 0, 0, -0.01, 1.016, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  31.43% { -webkit-transform: matrix3d(1.006, -0.017, 0, 0, -0.011, 1.006, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.006, -0.017, 0, 0, -0.011, 1.006, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  34.63% { -webkit-transform: matrix3d(0.997, -0.014, 0, 0, -0.01, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.997, -0.014, 0, 0, -0.01, 0.997, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  40.14% { -webkit-transform: matrix3d(0.992, -0.007, 0, 0, -0.005, 0.992, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(0.992, -0.007, 0, 0, -0.005, 0.992, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  56.46% { -webkit-transform: matrix3d(1, 0.001, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0.001, 0, 0, 0.001, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  62.36% { -webkit-transform: matrix3d(1.001, 0.001, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1.001, 0.001, 0, 0, 0, 1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  81.48% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  84.68% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); }
  100% { -webkit-transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); } 
}

</style>

<div class="lb-widget-panel lb-widget-panel is-chat-closed is-theme-light lb-widget-panel--position-right is-theme-color-6 is-operator-connected is-layout-balloon-opened is-operator-not-writing" style="display: none;">
  
  <div class="lb-widget-panel__item lb-widget-panel__item--call lb-widget-panel__item--call-left">

<div id="lb_button-call" style="position: relative; top: 0; left: 0;">
    <span class="lb_button_tooltip--container lb_button_tooltip--left">
        <span class="lb_button_tooltip lb_button_tooltip--hide lb_button_tooltip--hover">
<span class="lb_button_tooltip--text">Есть вопросы? Нажмите и мы перезвоним вам за 5 минут!</span>
        </span>
    </span>
	<a href="#" data-simplecallback-open="107"> <div class="lb_call-btn bigEntrance" style="opacity: 1;">
	    <div class="phone-call_wave"></div>
	</div> </a>
</div>
  </div>
  
</div>
```
