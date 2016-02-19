!function(t){var e;window.UIkit&&(e=t(UIkit)),"function"==typeof define&&define.amd&&define("uikit-parallax",["uikit"],function(){return e||t(UIkit)})}(function(t){"use strict";function e(e,a,r){var n,i,s,o,c,p,l,d=new Image;return i=e.element.css({"background-size":"cover","background-repeat":"no-repeat"}),n=i.css("background-image").replace(/^url\(/g,"").replace(/\)$/g,"").replace(/("|')/g,""),o=function(){var t=i.width(),n=i.height(),o="bg"==a?r.diff:r.diff/100*n;return n+=o,t+=Math.ceil(o*c),t>s.w&&n<s.h?e.element.css({"background-size":""}):(n>t/c?(p=Math.ceil(n*c),l=n):(p=t,l=Math.ceil(t/c)),void i.css({"background-size":p+"px "+l+"px"}))},d.onerror=function(){},d.onload=function(){s={w:d.width,h:d.height},c=d.width/d.height,t.$win.on("load resize orientationchange",t.Utils.debounce(function(){o()},50)),o()},d.src=n,!0}function a(t,e,a){return t=n(t),e=n(e),a=a||0,r(t,e,a)}function r(t,e,a){var r="rgba("+parseInt(t[0]+a*(e[0]-t[0]),10)+","+parseInt(t[1]+a*(e[1]-t[1]),10)+","+parseInt(t[2]+a*(e[2]-t[2]),10)+","+(t&&e?parseFloat(t[3]+a*(e[3]-t[3])):1);return r+=")"}function n(t){var e,a;return a=(e=/#([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})/.exec(t))?[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16),1]:(e=/#([0-9a-fA-F])([0-9a-fA-F])([0-9a-fA-F])/.exec(t))?[17*parseInt(e[1],16),17*parseInt(e[2],16),17*parseInt(e[3],16),1]:(e=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(t))?[parseInt(e[1]),parseInt(e[2]),parseInt(e[3]),1]:(e=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9\.]*)\s*\)/.exec(t))?[parseInt(e[1],10),parseInt(e[2],10),parseInt(e[3],10),parseFloat(e[4])]:l[t]||[255,255,255,0]}var i=[],s=!1,o=0,c=window.innerHeight,p=function(){o=t.$win.scrollTop(),window.requestAnimationFrame(function(){for(var t=0;t<i.length;t++)i[t].process()})};t.component("parallax",{defaults:{velocity:.5,target:!1,viewport:!1,media:!1},boot:function(){s=function(){var t,e=document.createElement("div"),a={WebkitTransform:"-webkit-transform",MSTransform:"-ms-transform",MozTransform:"-moz-transform",Transform:"transform"};document.body.insertBefore(e,null);for(var r in a)void 0!==e.style[r]&&(e.style[r]="translate3d(1px,1px,1px)",t=window.getComputedStyle(e).getPropertyValue(a[r]));return document.body.removeChild(e),void 0!==t&&t.length>0&&"none"!==t}(),t.$doc.on("scrolling.uk.document",p),t.$win.on("load resize orientationchange",t.Utils.debounce(function(){c=window.innerHeight,p()},50)),t.ready(function(e){t.$("[data-uk-parallax]",e).each(function(){var e=t.$(this);e.data("parallax")||t.parallax(e,t.Utils.options(e.attr("data-uk-parallax")))})})},init:function(){this.base=this.options.target?t.$(this.options.target):this.element,this.props={},this.velocity=this.options.velocity||1;var e=["target","velocity","viewport","plugins","media"];Object.keys(this.options).forEach(function(t){if(-1===e.indexOf(t)){var a,r,n,i,s=String(this.options[t]).split(",");t.match(/color/i)?(a=s[1]?s[0]:this._getStartValue(t),r=s[1]?s[1]:s[0],a||(a="rgba(255,255,255,0)")):(a=parseFloat(s[1]?s[0]:this._getStartValue(t)),r=parseFloat(s[1]?s[1]:s[0]),i=r>a?r-a:a-r,n=r>a?1:-1),this.props[t]={start:a,end:r,dir:n,diff:i}}}.bind(this)),i.push(this)},process:function(){if(this.options.media)switch(typeof this.options.media){case"number":if(window.innerWidth<this.options.media)return!1;break;case"string":if(window.matchMedia&&!window.matchMedia(this.options.media).matches)return!1}var t=this.percentageInViewport();this.options.viewport!==!1&&(t=0===this.options.viewport?1:t/this.options.viewport),this.update(t)},percentageInViewport:function(){var t,e,a,r=this.base.offset().top,n=this.base.outerHeight();return r>o+c?a=0:o>r+n?a=1:c>r+n?a=(c>o?o:o-c)/(r+n):(t=o+c-r,e=Math.round(t/((c+n)/100)),a=e/100),a},update:function(t){var r,n,i={transform:""},o=t*(1-(this.velocity-this.velocity*t));0>o&&(o=0),o>1&&(o=1),(void 0===this._percent||this._percent!=o)&&(Object.keys(this.props).forEach(function(c){switch(r=this.props[c],0===t?n=r.start:1===t?n=r.end:void 0!==r.diff&&(n=r.start+r.diff*o*r.dir),"bg"!=c&&"bgp"!=c||this._bgcover||(this._bgcover=e(this,c,r)),c){case"x":i.transform+=s?" translate3d("+n+"px, 0, 0)":" translateX("+n+"px)";break;case"xp":i.transform+=s?" translate3d("+n+"%, 0, 0)":" translateX("+n+"%)";break;case"y":i.transform+=s?" translate3d(0, "+n+"px, 0)":" translateY("+n+"px)";break;case"yp":i.transform+=s?" translate3d(0, "+n+"%, 0)":" translateY("+n+"%)";break;case"rotate":i.transform+=" rotate("+n+"deg)";break;case"scale":i.transform+=" scale("+n+")";break;case"bg":i["background-position"]="50% "+n+"px";break;case"bgp":i["background-position"]="50% "+n+"%";break;case"color":case"background-color":case"border-color":i[c]=a(r.start,r.end,o);break;default:i[c]=n}}.bind(this)),this.element.css(i),this._percent=o)},_getStartValue:function(t){var e=0;switch(t){case"scale":e=1;break;default:e=this.element.css(t)}return e||0}});var l={black:[0,0,0,1],blue:[0,0,255,1],brown:[165,42,42,1],cyan:[0,255,255,1],fuchsia:[255,0,255,1],gold:[255,215,0,1],green:[0,128,0,1],indigo:[75,0,130,1],khaki:[240,230,140,1],lime:[0,255,0,1],magenta:[255,0,255,1],maroon:[128,0,0,1],navy:[0,0,128,1],olive:[128,128,0,1],orange:[255,165,0,1],pink:[255,192,203,1],purple:[128,0,128,1],violet:[128,0,128,1],red:[255,0,0,1],silver:[192,192,192,1],white:[255,255,255,1],yellow:[255,255,0,1],transparent:[255,255,255,0]};return t.parallax});