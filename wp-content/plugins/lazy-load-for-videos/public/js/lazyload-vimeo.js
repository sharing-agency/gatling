!function(){"use strict";var t,r={726:function(t,r,e){var n=e(71),o=e(345),a=e(525),i=e(580),l=e(76);function c(t,r){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);r&&(n=n.filter((function(r){return Object.getOwnPropertyDescriptor(t,r).enumerable}))),e.push.apply(e,n)}return e}function u(t){for(var r=1;r<arguments.length;r++){var e=null!=arguments[r]?arguments[r]:{};r%2?c(Object(e),!0).forEach((function(r){f(t,r,e[r])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):c(Object(e)).forEach((function(r){Object.defineProperty(t,r,Object.getOwnPropertyDescriptor(e,r))}))}return t}function f(t,r,e){return r in t?Object.defineProperty(t,r,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[r]=e,t}function d(t,r){return function(t){if(Array.isArray(t))return t}(t)||function(t,r){var e=t&&("undefined"!=typeof Symbol&&t[Symbol.iterator]||t["@@iterator"]);if(null==e)return;var n,o,a=[],i=!0,l=!1;try{for(e=e.call(t);!(i=(n=e.next()).done)&&(a.push(n.value),!r||a.length!==r);i=!0);}catch(t){l=!0,o=t}finally{try{i||null==e.return||e.return()}finally{if(l)throw o}}return a}(t,r)||function(t,r){if(!t)return;if("string"==typeof t)return v(t,r);var e=Object.prototype.toString.call(t).slice(8,-1);"Object"===e&&t.constructor&&(e=t.constructor.name);if("Map"===e||"Set"===e)return Array.from(t);if("Arguments"===e||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(e))return v(t,r)}(t,r)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function v(t,r){(null==r||r>t.length)&&(r=t.length);for(var e=0,n=new Array(r);e<r;e++)n[e]=t[e];return n}var s,p="preview-vimeo",y={buttonstyle:"",playercolour:"",loadthumbnail:!0,thumbnailquality:!1};function b(t,r){var e=(0,a.Z)('<div aria-hidden="true" class="lazy-load-div"></div>');if(t.appendChild(e),window.llvConfig.vimeo.loadthumbnail){var n=function(t){if(!t)return"";var r=t.match(/_\d+x\d+/);if(r){var e=d(r[0].match(/\d+/g),2),n=e[0],o=e[1],a={basic:t.replace(r,"_".concat(640,"x",Math.round(o*(640/n)))),medium:t.replace(r,"_".concat(1280,"x",Math.round(o*(1280/n)))),max:t.replace(r,"")};return a[s.thumbnailquality]||a.basic}return t}(t.getAttribute("data-video-thumbnail"));n&&(0,o.bE)((0,i.Z)('[id="'.concat(r,'"]')),(function(t){return(0,o.X9)(t,n)}))}if(window.llvConfig.vimeo.show_title){var l=t.getAttribute("data-video-title"),c=window.llvConfig.vimeo.show_title&&l.length>0,u=(0,a.Z)('<div aria-hidden="true" class="lazy-load-info">\n        <div class="titletext vimeo">'.concat(l,"</div>\n      </div>"));c&&t.appendChild(u)}s.buttonstyle&&t.classList.add(s.buttonstyle)}function h(t){t.addEventListener("click",(function(t){var r=t.currentTarget;if(t.preventDefault(),"a"===r.tagName.toLowerCase()){var e,n=r.getAttribute("id"),o=r.getAttribute("href"),i=((e=new URL(o).search)?{queryParams:e.replace("?","").split("&").reduce((function(t,r){var e=d(r.split("="),2),n=e[0],o=e[1];return t[n]=o,t}),{})}:{queryParams:{}}).queryParams;r.classList.remove(p);var c=u(u({},i),{},{autoplay:1});s.playercolour&&(s.playercolour=s.playercolour.toString().replace(/[.#]/g,""),c.color=s.playercolour);var f=(0,a.Z)('<iframe src="'.concat(function(t){var r=t.videoId,e=t.queryParams;return"".concat(function(t){return"https://player.vimeo.com/video/".concat(t)}(r),"?").concat((0,l.Z)(e))}({videoId:n,queryParams:c}),'" style="height:').concat(Number(r.clientHeight),'px;width:100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen autoPlay allowFullScreen allow=autoplay></iframe>')),v=r.parentNode;v&&v.replaceChild(f,r)}}),!0)}function m(t){var r=t.rootNode;(0,i.Z)(".".concat(p),r).forEach((function(t){!function(t){var r=t,e=r.getAttribute("id");r.innerHTML="",b(r,e);var n=s.overlaytext.length>0,o=(0,a.Z)('<div aria-hidden="true" class="lazy-load-info-extra">\n      <div class="overlaytext">'.concat(s.overlaytext,"</div>\n    </div>"));n&&r.parentNode.insertBefore(o,null)}(t),(0,o.Ph)(t.parentNode),h(t)}))}var g=function(t){s=u(u({},y),t),(0,o.S1)({load:m,pluginOptions:s})};(0,n.Z)((function(){g(window.llvConfig.vimeo)}))}},e={};function n(t){var o=e[t];if(void 0!==o)return o.exports;var a=e[t]={exports:{}};return r[t](a,a.exports,n),a.exports}n.m=r,t=[],n.O=function(r,e,o,a){if(!e){var i=1/0;for(u=0;u<t.length;u++){e=t[u][0],o=t[u][1],a=t[u][2];for(var l=!0,c=0;c<e.length;c++)(!1&a||i>=a)&&Object.keys(n.O).every((function(t){return n.O[t](e[c])}))?e.splice(c--,1):(l=!1,a<i&&(i=a));l&&(t.splice(u--,1),r=o())}return r}a=a||0;for(var u=t.length;u>0&&t[u-1][2]>a;u--)t[u]=t[u-1];t[u]=[e,o,a]},n.d=function(t,r){for(var e in r)n.o(r,e)&&!n.o(t,e)&&Object.defineProperty(t,e,{enumerable:!0,get:r[e]})},n.o=function(t,r){return Object.prototype.hasOwnProperty.call(t,r)},function(){var t={549:0};n.O.j=function(r){return 0===t[r]};var r=function(r,e){var o,a,i=e[0],l=e[1],c=e[2],u=0;for(o in l)n.o(l,o)&&(n.m[o]=l[o]);if(c)var f=c(n);for(r&&r(e);u<i.length;u++)a=i[u],n.o(t,a)&&t[a]&&t[a][0](),t[i[u]]=0;return n.O(f)},e=self.webpackChunklazy_load_for_videos=self.webpackChunklazy_load_for_videos||[];e.forEach(r.bind(null,0)),e.push=r.bind(null,e.push.bind(e))}();var o=n.O(void 0,[358],(function(){return n(726)}));o=n.O(o)}();