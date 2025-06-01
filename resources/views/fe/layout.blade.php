<!DOCTYPE html>
<html lang="en-US" prefix="og: https://ogp.me/ns#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script>if(navigator.userAgent.match(/MSIE|Internet Explorer/i)||navigator.userAgent.match(/Trident\/7\..*?rv:11/i)){var href=document.location.href;if(!href.match(/[?&]nowprocket/)){if(href.indexOf("?")==-1){if(href.indexOf("#")==-1){}else{document.location.href=href.replace("#","?nowprocket=1#")}}else{if(href.indexOf("#")==-1){}else{document.location.href=href.replace("#","&nowprocket=1#")}}}}</script><script>(()=>{class RocketLazyLoadScripts{constructor(){this.v="2.0.3",this.userEvents=["keydown","keyup","mousedown","mouseup","mousemove","mouseover","mouseenter","mouseout","mouseleave","touchmove","touchstart","touchend","touchcancel","wheel","click","dblclick","input","visibilitychange"],this.attributeEvents=["onblur","onclick","oncontextmenu","ondblclick","onfocus","onmousedown","onmouseenter","onmouseleave","onmousemove","onmouseout","onmouseover","onmouseup","onmousewheel","onscroll","onsubmit"]}async t(){this.i(),this.o(),/iP(ad|hone)/.test(navigator.userAgent)&&this.h(),this.u(),this.l(this),this.m(),this.k(this),this.p(this),this._(),await Promise.all([this.R(),this.L()]),this.lastBreath=Date.now(),this.S(this),this.P(),this.D(),this.O(),this.M(),await this.C(this.delayedScripts.normal),await this.C(this.delayedScripts.defer),await this.C(this.delayedScripts.async),this.F("domReady"),await this.T(),await this.j(),await this.I(),this.F("windowLoad"),await this.A(),window.dispatchEvent(new Event("rocket-allScriptsLoaded")),this.everythingLoaded=!0,this.lastTouchEnd&&await new Promise((t=>setTimeout(t,500-Date.now()+this.lastTouchEnd))),this.H(),this.F("all"),this.U(),this.W()}i(){this.CSPIssue=sessionStorage.getItem("rocketCSPIssue"),document.addEventListener("securitypolicyviolation",(t=>{this.CSPIssue||"script-src-elem"!==t.violatedDirective||"data"!==t.blockedURI||(this.CSPIssue=!0,sessionStorage.setItem("rocketCSPIssue",!0))}),{isRocket:!0})}o(){window.addEventListener("pageshow",(t=>{this.persisted=t.persisted,this.realWindowLoadedFired=!0}),{isRocket:!0}),window.addEventListener("pagehide",(()=>{this.onFirstUserAction=null}),{isRocket:!0})}h(){let t;function e(e){t=e}window.addEventListener("touchstart",e,{isRocket:!0}),window.addEventListener("touchend",(function i(o){Math.abs(o.changedTouches[0].pageX-t.changedTouches[0].pageX)<10&&Math.abs(o.changedTouches[0].pageY-t.changedTouches[0].pageY)<10&&o.timeStamp-t.timeStamp<200&&(o.target.dispatchEvent(new PointerEvent("click",{target:o.target,bubbles:!0,cancelable:!0,detail:1})),event.preventDefault(),window.removeEventListener("touchstart",e,{isRocket:!0}),window.removeEventListener("touchend",i,{isRocket:!0}))}),{isRocket:!0})}q(t){this.userActionTriggered||("mousemove"!==t.type||this.firstMousemoveIgnored?"keyup"===t.type||"mouseover"===t.type||"mouseout"===t.type||(this.userActionTriggered=!0,this.onFirstUserAction&&this.onFirstUserAction()):this.firstMousemoveIgnored=!0),"click"===t.type&&t.preventDefault(),this.savedUserEvents.length>0&&(t.stopPropagation(),t.stopImmediatePropagation()),"touchstart"===this.lastEvent&&"touchend"===t.type&&(this.lastTouchEnd=Date.now()),"click"===t.type&&(this.lastTouchEnd=0),this.lastEvent=t.type,this.savedUserEvents.push(t)}u(){this.savedUserEvents=[],this.userEventHandler=this.q.bind(this),this.userEvents.forEach((t=>window.addEventListener(t,this.userEventHandler,{passive:!1,isRocket:!0})))}U(){this.userEvents.forEach((t=>window.removeEventListener(t,this.userEventHandler,{passive:!1,isRocket:!0}))),this.savedUserEvents.forEach((t=>{t.target.dispatchEvent(new window[t.constructor.name](t.type,t))}))}m(){this.eventsMutationObserver=new MutationObserver((t=>{const e="return false";for(const i of t){if("attributes"===i.type){const t=i.target.getAttribute(i.attributeName);t&&t!==e&&(i.target.setAttribute("data-rocket-"+i.attributeName,t),i.target["rocket"+i.attributeName]=new Function("event",t),i.target.setAttribute(i.attributeName,e))}"childList"===i.type&&i.addedNodes.forEach((t=>{if(t.nodeType===Node.ELEMENT_NODE)for(const i of t.attributes)this.attributeEvents.includes(i.name)&&i.value&&""!==i.value&&(t.setAttribute("data-rocket-"+i.name,i.value),t["rocket"+i.name]=new Function("event",i.value),t.setAttribute(i.name,e))}))}})),this.eventsMutationObserver.observe(document,{subtree:!0,childList:!0,attributeFilter:this.attributeEvents})}H(){this.eventsMutationObserver.disconnect(),this.attributeEvents.forEach((t=>{document.querySelectorAll("[data-rocket-"+t+"]").forEach((e=>{e.setAttribute(t,e.getAttribute("data-rocket-"+t)),e.removeAttribute("data-rocket-"+t)}))}))}k(t){Object.defineProperty(HTMLElement.prototype,"onclick",{get(){return this.rocketonclick||null},set(e){this.rocketonclick=e,this.setAttribute(t.everythingLoaded?"onclick":"data-rocket-onclick","this.rocketonclick(event)")}})}S(t){function e(e,i){let o=e[i];e[i]=null,Object.defineProperty(e,i,{get:()=>o,set(s){t.everythingLoaded?o=s:e["rocket"+i]=o=s}})}e(document,"onreadystatechange"),e(window,"onload"),e(window,"onpageshow");try{Object.defineProperty(document,"readyState",{get:()=>t.rocketReadyState,set(e){t.rocketReadyState=e},configurable:!0}),document.readyState="loading"}catch(t){console.log("WPRocket DJE readyState conflict, bypassing")}}l(t){this.originalAddEventListener=EventTarget.prototype.addEventListener,this.originalRemoveEventListener=EventTarget.prototype.removeEventListener,this.savedEventListeners=[],EventTarget.prototype.addEventListener=function(e,i,o){o&&o.isRocket||!t.B(e,this)&&!t.userEvents.includes(e)||t.B(e,this)&&!t.userActionTriggered||e.startsWith("rocket-")||t.everythingLoaded?t.originalAddEventListener.call(this,e,i,o):t.savedEventListeners.push({target:this,remove:!1,type:e,func:i,options:o})},EventTarget.prototype.removeEventListener=function(e,i,o){o&&o.isRocket||!t.B(e,this)&&!t.userEvents.includes(e)||t.B(e,this)&&!t.userActionTriggered||e.startsWith("rocket-")||t.everythingLoaded?t.originalRemoveEventListener.call(this,e,i,o):t.savedEventListeners.push({target:this,remove:!0,type:e,func:i,options:o})}}F(t){"all"===t&&(EventTarget.prototype.addEventListener=this.originalAddEventListener,EventTarget.prototype.removeEventListener=this.originalRemoveEventListener),this.savedEventListeners=this.savedEventListeners.filter((e=>{let i=e.type,o=e.target||window;return"domReady"===t&&"DOMContentLoaded"!==i&&"readystatechange"!==i||("windowLoad"===t&&"load"!==i&&"readystatechange"!==i&&"pageshow"!==i||(this.B(i,o)&&(i="rocket-"+i),e.remove?o.removeEventListener(i,e.func,e.options):o.addEventListener(i,e.func,e.options),!1))}))}p(t){let e;function i(e){return t.everythingLoaded?e:e.split(" ").map((t=>"load"===t||t.startsWith("load.")?"rocket-jquery-load":t)).join(" ")}function o(o){function s(e){const s=o.fn[e];o.fn[e]=o.fn.init.prototype[e]=function(){return this[0]===window&&t.userActionTriggered&&("string"==typeof arguments[0]||arguments[0]instanceof String?arguments[0]=i(arguments[0]):"object"==typeof arguments[0]&&Object.keys(arguments[0]).forEach((t=>{const e=arguments[0][t];delete arguments[0][t],arguments[0][i(t)]=e}))),s.apply(this,arguments),this}}if(o&&o.fn&&!t.allJQueries.includes(o)){const e={DOMContentLoaded:[],"rocket-DOMContentLoaded":[]};for(const t in e)document.addEventListener(t,(()=>{e[t].forEach((t=>t()))}),{isRocket:!0});o.fn.ready=o.fn.init.prototype.ready=function(i){function s(){parseInt(o.fn.jquery)>2?setTimeout((()=>i.bind(document)(o))):i.bind(document)(o)}return t.realDomReadyFired?!t.userActionTriggered||t.fauxDomReadyFired?s():e["rocket-DOMContentLoaded"].push(s):e.DOMContentLoaded.push(s),o([])},s("on"),s("one"),s("off"),t.allJQueries.push(o)}e=o}t.allJQueries=[],o(window.jQuery),Object.defineProperty(window,"jQuery",{get:()=>e,set(t){o(t)}})}P(){const t=new Map;document.write=document.writeln=function(e){const i=document.currentScript,o=document.createRange(),s=i.parentElement;let n=t.get(i);void 0===n&&(n=i.nextSibling,t.set(i,n));const c=document.createDocumentFragment();o.setStart(c,0),c.appendChild(o.createContextualFragment(e)),s.insertBefore(c,n)}}async R(){return new Promise((t=>{this.userActionTriggered?t():this.onFirstUserAction=t}))}async L(){return new Promise((t=>{document.addEventListener("DOMContentLoaded",(()=>{this.realDomReadyFired=!0,t()}),{isRocket:!0})}))}async I(){return this.realWindowLoadedFired?Promise.resolve():new Promise((t=>{window.addEventListener("load",t,{isRocket:!0})}))}M(){this.pendingScripts=[];this.scriptsMutationObserver=new MutationObserver((t=>{for(const e of t)e.addedNodes.forEach((t=>{"SCRIPT"!==t.tagName||t.noModule||t.isWPRocket||this.pendingScripts.push({script:t,promise:new Promise((e=>{const i=()=>{const i=this.pendingScripts.findIndex((e=>e.script===t));i>=0&&this.pendingScripts.splice(i,1),e()};t.addEventListener("load",i,{isRocket:!0}),t.addEventListener("error",i,{isRocket:!0}),setTimeout(i,1e3)}))})}))})),this.scriptsMutationObserver.observe(document,{childList:!0,subtree:!0})}async j(){await this.J(),this.pendingScripts.length?(await this.pendingScripts[0].promise,await this.j()):this.scriptsMutationObserver.disconnect()}D(){this.delayedScripts={normal:[],async:[],defer:[]},document.querySelectorAll("script[type$=rocketlazyloadscript]").forEach((t=>{t.hasAttribute("data-rocket-src")?t.hasAttribute("async")&&!1!==t.async?this.delayedScripts.async.push(t):t.hasAttribute("defer")&&!1!==t.defer||"module"===t.getAttribute("data-rocket-type")?this.delayedScripts.defer.push(t):this.delayedScripts.normal.push(t):this.delayedScripts.normal.push(t)}))}async _(){await this.L();let t=[];document.querySelectorAll("script[type$=rocketlazyloadscript][data-rocket-src]").forEach((e=>{let i=e.getAttribute("data-rocket-src");if(i&&!i.startsWith("data:")){i.startsWith("//")&&(i=location.protocol+i);try{const o=new URL(i).origin;o!==location.origin&&t.push({src:o,crossOrigin:e.crossOrigin||"module"===e.getAttribute("data-rocket-type")})}catch(t){}}})),t=[...new Map(t.map((t=>[JSON.stringify(t),t]))).values()],this.N(t,"preconnect")}async $(t){if(await this.G(),!0!==t.noModule||!("noModule"in HTMLScriptElement.prototype))return new Promise((e=>{let i;function o(){(i||t).setAttribute("data-rocket-status","executed"),e()}try{if(navigator.userAgent.includes("Firefox/")||""===navigator.vendor||this.CSPIssue)i=document.createElement("script"),[...t.attributes].forEach((t=>{let e=t.nodeName;"type"!==e&&("data-rocket-type"===e&&(e="type"),"data-rocket-src"===e&&(e="src"),i.setAttribute(e,t.nodeValue))})),t.text&&(i.text=t.text),t.nonce&&(i.nonce=t.nonce),i.hasAttribute("src")?(i.addEventListener("load",o,{isRocket:!0}),i.addEventListener("error",(()=>{i.setAttribute("data-rocket-status","failed-network"),e()}),{isRocket:!0}),setTimeout((()=>{i.isConnected||e()}),1)):(i.text=t.text,o()),i.isWPRocket=!0,t.parentNode.replaceChild(i,t);else{const i=t.getAttribute("data-rocket-type"),s=t.getAttribute("data-rocket-src");i?(t.type=i,t.removeAttribute("data-rocket-type")):t.removeAttribute("type"),t.addEventListener("load",o,{isRocket:!0}),t.addEventListener("error",(i=>{this.CSPIssue&&i.target.src.startsWith("data:")?(console.log("WPRocket: CSP fallback activated"),t.removeAttribute("src"),this.$(t).then(e)):(t.setAttribute("data-rocket-status","failed-network"),e())}),{isRocket:!0}),s?(t.fetchPriority="high",t.removeAttribute("data-rocket-src"),t.src=s):t.src="data:text/javascript;base64,"+window.btoa(unescape(encodeURIComponent(t.text)))}}catch(i){t.setAttribute("data-rocket-status","failed-transform"),e()}}));t.setAttribute("data-rocket-status","skipped")}async C(t){const e=t.shift();return e?(e.isConnected&&await this.$(e),this.C(t)):Promise.resolve()}O(){this.N([...this.delayedScripts.normal,...this.delayedScripts.defer,...this.delayedScripts.async],"preload")}N(t,e){this.trash=this.trash||[];let i=!0;var o=document.createDocumentFragment();t.forEach((t=>{const s=t.getAttribute&&t.getAttribute("data-rocket-src")||t.src;if(s&&!s.startsWith("data:")){const n=document.createElement("link");n.href=s,n.rel=e,"preconnect"!==e&&(n.as="script",n.fetchPriority=i?"high":"low"),t.getAttribute&&"module"===t.getAttribute("data-rocket-type")&&(n.crossOrigin=!0),t.crossOrigin&&(n.crossOrigin=t.crossOrigin),t.integrity&&(n.integrity=t.integrity),t.nonce&&(n.nonce=t.nonce),o.appendChild(n),this.trash.push(n),i=!1}})),document.head.appendChild(o)}W(){this.trash.forEach((t=>t.remove()))}async T(){try{document.readyState="interactive"}catch(t){}this.fauxDomReadyFired=!0;try{await this.G(),document.dispatchEvent(new Event("rocket-readystatechange")),await this.G(),document.rocketonreadystatechange&&document.rocketonreadystatechange(),await this.G(),document.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this.G(),window.dispatchEvent(new Event("rocket-DOMContentLoaded"))}catch(t){console.error(t)}}async A(){try{document.readyState="complete"}catch(t){}try{await this.G(),document.dispatchEvent(new Event("rocket-readystatechange")),await this.G(),document.rocketonreadystatechange&&document.rocketonreadystatechange(),await this.G(),window.dispatchEvent(new Event("rocket-load")),await this.G(),window.rocketonload&&window.rocketonload(),await this.G(),this.allJQueries.forEach((t=>t(window).trigger("rocket-jquery-load"))),await this.G();const t=new Event("rocket-pageshow");t.persisted=this.persisted,window.dispatchEvent(t),await this.G(),window.rocketonpageshow&&window.rocketonpageshow({persisted:this.persisted})}catch(t){console.error(t)}}async G(){Date.now()-this.lastBreath>45&&(await this.J(),this.lastBreath=Date.now())}async J(){return document.hidden?new Promise((t=>setTimeout(t))):new Promise((t=>requestAnimationFrame(t)))}B(t,e){return e===document&&"readystatechange"===t||(e===document&&"DOMContentLoaded"===t||(e===window&&"DOMContentLoaded"===t||(e===window&&"load"===t||e===window&&"pageshow"===t)))}static run(){(new RocketLazyLoadScripts).t()}}RocketLazyLoadScripts.run()})();</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11"> 
	<link rel="preload" href={{asset("wp-content/astra-local-fonts/lato/S6uyw4BMUTPHjx4wXg.woff2")}} as="font" type="font/woff2" crossorigin><link rel="preload" href={{asset("wp-content/astra-local-fonts/poppins/pxiByp8kv8JHgFVrLCz7Z1xlFQ.woff2")}} as="font" type="font/woff2" crossorigin>	<style>img:is([sizes="auto" i], [sizes^="auto," i]) { contain-intrinsic-size: 3000px 1500px }</style>
<!-- Search Engine Optimization by Rank Math PRO - https://rankmath.com/ -->
<title>Data Driven Growth Marketing Agency | LOPOKOPI.CO</title><link rel="preload" data-rocket-preload as="image" href={{asset("wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO-200x43.png")}} imagesrcset="https://lopokopi.co/wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO-200x43.png 200w,https://lopokopi.co/wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO-300x64.png.webp 300w,https://lopokopi.co/wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO-1024x220.png.webp 1024w,https://lopokopi.co/wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO-768x165.png.webp 768w,https://lopokopi.co/wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO-1536x330.png.webp 1536w,https://lopokopi.co/wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO-2048x440.png.webp 2048w" imagesizes="(max-width: 200px) 100vw, 200px" fetchpriority="high">
<meta name="description" content="Unlock Massive Growth with Marketing Agency to Hit Your Business Goals through Paid Ads, CPAs, and More!"/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<script type="application/ld+json" class="rank-math-schema-pro">{"@context":"https://schema.org","@graph":[{"@type":"Place","@id":"https://lopokopi.co/#place","address":{"@type":"PostalAddress","streetAddress":"Teras Yasmin, Jl. KH. R. Abdullah Bin Nuh No.33 - 35 Lantai 2","addressLocality":"RT.10/RW.08, Curugmekar, Kec. Bogor Barat","addressRegion":"Kota Bogor, Jawa Barat","postalCode":"16113","addressCountry":"Indonesia"}},{"@type":["ProfessionalService","Organization"],"@id":"https://lopokopi.co/#organization","name":"LOPOKOPI.CO","url":"https://lopokopi.co","sameAs":["https://www.facebook.com/lopokopi.co","https://www.instagram.com/lopokopi.co","https://id.linkedin.com/company/lopokopi-co","https://www.youtube.com/@lopokopico","https://www.tiktok.com/@lopokopi.co"],"email":"lopokopi.digital@gmail.com","address":{"@type":"PostalAddress","streetAddress":"Teras Yasmin, Jl. KH. R. Abdullah Bin Nuh No.33 - 35 Lantai 2","addressLocality":"RT.10/RW.08, Curugmekar, Kec. Bogor Barat","addressRegion":"Kota Bogor, Jawa Barat","postalCode":"16113","addressCountry":"Indonesia"},"logo":{"@type":"ImageObject","@id":"https://lopokopi.co/#logo","url":"https://lopokopi.co/wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO.png","contentUrl":"https://lopokopi.co/wp-content/uploads/2024/03/Logo-LOPOKOPI-CO-Horizontal-LOGO.png","caption":"LOPOKOPI.CO","inLanguage":"en-US","width":"2560","height":"550"},"openingHours":["Monday,Tuesday,Wednesday,Thursday,Friday 09:00-18:00"],"location":{"@id":"https://lopokopi.co/#place"},"image":{"@id":"https://lopokopi.co/#logo"}},{"@type":"WebSite","@id":"https://lopokopi.co/#website","url":"https://lopokopi.co","name":"LOPOKOPI.CO","publisher":{"@id":"https://lopokopi.co/#organization"},"inLanguage":"en-US","potentialAction":{"@type":"SearchAction","target":"https://lopokopi.co/?s={search_term_string}","query-input":"required name=search_term_string"}},{"@type":"ImageObject","@id":"https://lopokopi.co/wp-content/uploads/2023/06/Partnership-2.png","url":"https://lopokopi.co/wp-content/uploads/2023/06/Partnership-2.png","width":"200","height":"200","inLanguage":"en-US"},{"@type":"WebPage","@id":"https://lopokopi.co/#webpage","url":"https://lopokopi.co/","name":"Data Driven Growth Marketing Agency | LOPOKOPI.CO","datePublished":"2025-01-03T13:33:38+07:00","dateModified":"2025-05-26T17:17:22+07:00","about":{"@id":"https://lopokopi.co/#organization"},"isPartOf":{"@id":"https://lopokopi.co/#website"},"primaryImageOfPage":{"@id":"https://lopokopi.co/wp-content/uploads/2023/06/Partnership-2.png"},"inLanguage":"en-US"}]}</script>
<meta name="google-site-verification" content="google86f613c1fc1fda30" />
<!-- /Rank Math WordPress SEO plugin -->
<link rel='stylesheet' id='astra-theme-css-css' href='wp-content/themes/astra/assets/css/minified/main.min_ver-4.11.1.css' media='all' />
<link data-minify="1" rel='stylesheet' id='astra-google-fonts-css' href='wp-content/cache/min/1/wp-content/astra-local-fonts/astra-local-fonts_ver-1744360496.css' media='all' />
<link data-minify="1" rel='stylesheet' id='astra-theme-dynamic-css' href='wp-content/cache/min/1/wp-content/uploads/astra/astra-theme-dynamic-css-post-46230_ver-1744360496.css' media='all' />
<style id='wp-emoji-styles-inline-css'>
	img.wp-smiley, img.emoji {
		display: inline !important;
		border: none !important;
		box-shadow: none !important;
		height: 1em !important;
		width: 1em !important;
		margin: 0 0.07em !important;
		vertical-align: -0.1em !important;
		background: none !important;
		padding: 0 !important;
	}
</style>
<style id='global-styles-inline-css'>
:root{--wp--preset--aspect-ratio--square: 1;--wp--preset--aspect-ratio--4-3: 4/3;--wp--preset--aspect-ratio--3-4: 3/4;--wp--preset--aspect-ratio--3-2: 3/2;--wp--preset--aspect-ratio--2-3: 2/3;--wp--preset--aspect-ratio--16-9: 16/9;--wp--preset--aspect-ratio--9-16: 9/16;--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--color--ast-global-color-0: var(--ast-global-color-0);--wp--preset--color--ast-global-color-1: var(--ast-global-color-1);--wp--preset--color--ast-global-color-2: var(--ast-global-color-2);--wp--preset--color--ast-global-color-3: var(--ast-global-color-3);--wp--preset--color--ast-global-color-4: var(--ast-global-color-4);--wp--preset--color--ast-global-color-5: var(--ast-global-color-5);--wp--preset--color--ast-global-color-6: var(--ast-global-color-6);--wp--preset--color--ast-global-color-7: var(--ast-global-color-7);--wp--preset--color--ast-global-color-8: var(--ast-global-color-8);--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);}:root { --wp--style--global--content-size: var(--wp--custom--ast-content-width-size);--wp--style--global--wide-size: var(--wp--custom--ast-wide-width-size); }:where(body) { margin: 0; }.wp-site-blocks > .alignleft { float: left; margin-right: 2em; }.wp-site-blocks > .alignright { float: right; margin-left: 2em; }.wp-site-blocks > .aligncenter { justify-content: center; margin-left: auto; margin-right: auto; }:where(.wp-site-blocks) > * { margin-block-start: 24px; margin-block-end: 0; }:where(.wp-site-blocks) > :first-child { margin-block-start: 0; }:where(.wp-site-blocks) > :last-child { margin-block-end: 0; }:root { --wp--style--block-gap: 24px; }:root :where(.is-layout-flow) > :first-child{margin-block-start: 0;}:root :where(.is-layout-flow) > :last-child{margin-block-end: 0;}:root :where(.is-layout-flow) > *{margin-block-start: 24px;margin-block-end: 0;}:root :where(.is-layout-constrained) > :first-child{margin-block-start: 0;}:root :where(.is-layout-constrained) > :last-child{margin-block-end: 0;}:root :where(.is-layout-constrained) > *{margin-block-start: 24px;margin-block-end: 0;}:root :where(.is-layout-flex){gap: 24px;}:root :where(.is-layout-grid){gap: 24px;}.is-layout-flow > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}.is-layout-flow > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}.is-layout-flow > .aligncenter{margin-left: auto !important;margin-right: auto !important;}.is-layout-constrained > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}.is-layout-constrained > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}.is-layout-constrained > .aligncenter{margin-left: auto !important;margin-right: auto !important;}.is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)){max-width: var(--wp--style--global--content-size);margin-left: auto !important;margin-right: auto !important;}.is-layout-constrained > .alignwide{max-width: var(--wp--style--global--wide-size);}body .is-layout-flex{display: flex;}.is-layout-flex{flex-wrap: wrap;align-items: center;}.is-layout-flex > :is(*, div){margin: 0;}body .is-layout-grid{display: grid;}.is-layout-grid > :is(*, div){margin: 0;}body{padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;}a:where(:not(.wp-element-button)){text-decoration: none;}:root :where(.wp-element-button, .wp-block-button__link){background-color: #32373c;border-width: 0;color: #fff;font-family: inherit;font-size: inherit;line-height: inherit;padding: calc(0.667em + 2px) calc(1.333em + 2px);text-decoration: none;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-ast-global-color-0-color{color: var(--wp--preset--color--ast-global-color-0) !important;}.has-ast-global-color-1-color{color: var(--wp--preset--color--ast-global-color-1) !important;}.has-ast-global-color-2-color{color: var(--wp--preset--color--ast-global-color-2) !important;}.has-ast-global-color-3-color{color: var(--wp--preset--color--ast-global-color-3) !important;}.has-ast-global-color-4-color{color: var(--wp--preset--color--ast-global-color-4) !important;}.has-ast-global-color-5-color{color: var(--wp--preset--color--ast-global-color-5) !important;}.has-ast-global-color-6-color{color: var(--wp--preset--color--ast-global-color-6) !important;}.has-ast-global-color-7-color{color: var(--wp--preset--color--ast-global-color-7) !important;}.has-ast-global-color-8-color{color: var(--wp--preset--color--ast-global-color-8) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-ast-global-color-0-background-color{background-color: var(--wp--preset--color--ast-global-color-0) !important;}.has-ast-global-color-1-background-color{background-color: var(--wp--preset--color--ast-global-color-1) !important;}.has-ast-global-color-2-background-color{background-color: var(--wp--preset--color--ast-global-color-2) !important;}.has-ast-global-color-3-background-color{background-color: var(--wp--preset--color--ast-global-color-3) !important;}.has-ast-global-color-4-background-color{background-color: var(--wp--preset--color--ast-global-color-4) !important;}.has-ast-global-color-5-background-color{background-color: var(--wp--preset--color--ast-global-color-5) !important;}.has-ast-global-color-6-background-color{background-color: var(--wp--preset--color--ast-global-color-6) !important;}.has-ast-global-color-7-background-color{background-color: var(--wp--preset--color--ast-global-color-7) !important;}.has-ast-global-color-8-background-color{background-color: var(--wp--preset--color--ast-global-color-8) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-ast-global-color-0-border-color{border-color: var(--wp--preset--color--ast-global-color-0) !important;}.has-ast-global-color-1-border-color{border-color: var(--wp--preset--color--ast-global-color-1) !important;}.has-ast-global-color-2-border-color{border-color: var(--wp--preset--color--ast-global-color-2) !important;}.has-ast-global-color-3-border-color{border-color: var(--wp--preset--color--ast-global-color-3) !important;}.has-ast-global-color-4-border-color{border-color: var(--wp--preset--color--ast-global-color-4) !important;}.has-ast-global-color-5-border-color{border-color: var(--wp--preset--color--ast-global-color-5) !important;}.has-ast-global-color-6-border-color{border-color: var(--wp--preset--color--ast-global-color-6) !important;}.has-ast-global-color-7-border-color{border-color: var(--wp--preset--color--ast-global-color-7) !important;}.has-ast-global-color-8-border-color{border-color: var(--wp--preset--color--ast-global-color-8) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
:root :where(.wp-block-pullquote){font-size: 1.5em;line-height: 1.6;}
</style>
<link rel='stylesheet' id='formychat-frontend-css' href='wp-content/plugins/social-contact-form/public/css/frontend.min_ver-2.10.7.css' media='all' />
<style id='formychat-frontend-inline-css'>
@font-face {
						font-family: 'sans-serif';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/sans-serif.ttf') format('truetype');
					}@font-face {
						font-family: 'Arial';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Arial.ttf') format('truetype');
					}@font-face {
						font-family: 'Arial Black';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Arial+Black.ttf') format('truetype');
					}@font-face {
						font-family: 'Comic Sans';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Comic+Sans.ttf') format('truetype');
					}@font-face {
						font-family: 'Courier New';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Courier+New.ttf') format('truetype');
					}@font-face {
						font-family: 'Georgia';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Georgia.ttf') format('truetype');
					}@font-face {
						font-family: 'Lucida Console';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Lucida+Console.ttf') format('truetype');
					}@font-face {
						font-family: 'Lucida Sans';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Lucida+Sans.ttf') format('truetype');
					}@font-face {
						font-family: 'Tahoma';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Tahoma.ttf') format('truetype');
					}@font-face {
						font-family: 'Times New Roman';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Times+New+Roman.ttf') format('truetype');
					}@font-face {
						font-family: 'Trebuchet';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Trebuchet.ttf') format('truetype');
					}@font-face {
						font-family: 'Verdana';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Verdana.ttf') format('truetype');
					}@font-face {
						font-family: 'Ubuntu';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Ubuntu.ttf') format('truetype');
					}@font-face {
						font-family: 'Roboto';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Roboto.ttf') format('truetype');
					}@font-face {
						font-family: 'Roboto Condensed';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Roboto+Condensed.ttf') format('truetype');
					}@font-face {
						font-family: 'Open Sans';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Open+Sans.ttf') format('truetype');
					}@font-face {
						font-family: 'Lato';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Lato.ttf') format('truetype');
					}@font-face {
						font-family: 'Montserrat';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Montserrat.ttf') format('truetype');
					}@font-face {
						font-family: 'Raleway';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Raleway.ttf') format('truetype');
					}@font-face {
						font-family: 'PT Sans';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/PT+Sans.ttf') format('truetype');
					}@font-face {
						font-family: 'Roboto Slab';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Roboto+Slab.ttf') format('truetype');
					}@font-face {
						font-family: 'Merriweather';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Merriweather.ttf') format('truetype');
					}@font-face {
						font-family: 'Playfair Display';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Playfair+Display.ttf') format('truetype');
					}@font-face {
						font-family: 'Source Sans Pro';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Source+Sans+Pro.ttf') format('truetype');
					}@font-face {
						font-family: 'Noto Sans';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Noto+Sans.ttf') format('truetype');
					}@font-face {
						font-family: 'Noto Serif';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Noto+Serif.ttf') format('truetype');
					}@font-face {
						font-family: 'Roboto Mono';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Roboto+Mono.ttf') format('truetype');
					}@font-face {
						font-family: 'Nunito';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Nunito.ttf') format('truetype');
					}@font-face {
						font-family: 'Poppins';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Poppins.ttf') format('truetype');
					}@font-face {
						font-family: 'Rubik';
						src: url('https://lopokopi.co/wp-content/plugins/social-contact-form/public/fonts/Rubik.ttf') format('truetype');
					}
</style>
<link data-minify="1" rel='stylesheet' id='astra-addon-css-css' href='wp-content/cache/min/1/wp-content/uploads/astra-addon/astra-addon-682404dd62d3f1-08944000_ver-1747797662.css' media='all' />
<link data-minify="1" rel='stylesheet' id='astra-addon-dynamic-css' href='wp-content/cache/min/1/wp-content/uploads/astra-addon/astra-addon-dynamic-css-post-46230_ver-1744360496.css' media='all' />
<link rel='stylesheet' id='elementor-frontend-css' href='wp-content/plugins/elementor/assets/css/frontend.min_ver-3.29.0.css' media='all' />
<link rel='stylesheet' id='elementor-post-40906-css' href='wp-content/uploads/elementor/css/post-40906_ver-1743044771.css' media='all' />
<link rel='stylesheet' id='elementor-post-40907-css' href='wp-content/uploads/elementor/css/post-40907_ver-1743044771.css' media='all' />
<link rel='stylesheet' id='elementor-post-40908-css' href='wp-content/uploads/elementor/css/post-40908_ver-1743044771.css' media='all' />
<link rel='stylesheet' id='elementor-post-40919-css' href='wp-content/uploads/elementor/css/post-40919_ver-1743044771.css' media='all' />
<link rel='stylesheet' id='elementor-post-40916-css' href='wp-content/uploads/elementor/css/post-40916_ver-1743044771.css' media='all' />
<link rel='stylesheet' id='widget-image-css' href='wp-content/plugins/elementor/assets/css/widget-image.min_ver-3.29.0.css' media='all' />
<link rel='stylesheet' id='widget-heading-css' href='wp-content/plugins/elementor/assets/css/widget-heading.min_ver-3.29.0.css' media='all' />
<link rel='stylesheet' id='widget-icon-list-css' href='wp-content/plugins/elementor/assets/css/widget-icon-list.min_ver-3.29.0.css' media='all' />
<link rel='stylesheet' id='widget-social-icons-css' href='wp-content/plugins/elementor/assets/css/widget-social-icons.min_ver-3.29.0.css' media='all' />
<link rel='stylesheet' id='e-apple-webkit-css' href='wp-content/plugins/elementor/assets/css/conditionals/apple-webkit.min_ver-3.29.0.css' media='all' />
<link rel='stylesheet' id='eael-general-css' href='wp-content/plugins/essential-addons-for-elementor-lite/assets/front-end/css/view/general.min_ver-6.1.15.css' media='all' />
<link data-minify="1" rel='stylesheet' id='eael-46230-css' href='wp-content/cache/min/1/wp-content/uploads/essential-addons-elementor/eael-46230_ver-1744360496.css' media='all' />
<link rel='stylesheet' id='elementor-post-6-css' href='wp-content/uploads/elementor/css/post-6_ver-1743044771.css' media='all' />
<link data-minify="1" rel='stylesheet' id='font-awesome-5-all-css' href='https://lopokopi.co/wp-content/cache/min/1/wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min.css?ver=1744360496' media='all' />
<link rel='stylesheet' id='font-awesome-4-shim-css' href='https://lopokopi.co/wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min.css?ver=3.29.0' media='all' />
<link data-minify="1" rel='stylesheet' id='she-header-style-css' href='https://lopokopi.co/wp-content/cache/min/1/wp-content/plugins/sticky-header-effects-for-elementor/assets/css/she-header-style.css?ver=1744360496' media='all' />
<link rel='stylesheet' id='widget-icon-box-css' href='https://lopokopi.co/wp-content/plugins/elementor/assets/css/widget-icon-box.min.css?ver=3.29.0' media='all' />
<link data-minify="1" rel='stylesheet' id='swiper-css' href='https://lopokopi.co/wp-content/cache/min/1/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min.css?ver=1744360496' media='all' />
<link rel='stylesheet' id='e-swiper-css' href='https://lopokopi.co/wp-content/plugins/elementor/assets/css/conditionals/e-swiper.min.css?ver=3.29.0' media='all' />
<link rel='stylesheet' id='widget-nested-carousel-css' href='https://lopokopi.co/wp-content/plugins/elementor-pro/assets/css/widget-nested-carousel.min.css?ver=3.29.0' media='all' />
<link rel='stylesheet' id='e-motion-fx-css' href='https://lopokopi.co/wp-content/plugins/elementor-pro/assets/css/modules/motion-fx.min.css?ver=3.29.0' media='all' />
<link rel='stylesheet' id='elementor-post-46230-css' href='https://lopokopi.co/wp-content/uploads/elementor/css/post-46230.css?ver=1748254650' media='all' />
<link rel='stylesheet' id='elementor-post-29605-css' href='https://lopokopi.co/wp-content/uploads/elementor/css/post-29605.css?ver=1746183744' media='all' />
<style id='rocket-lazyload-inline-css'>
.rll-youtube-player{position:relative;padding-bottom:56.23%;height:0;overflow:hidden;max-width:100%;}.rll-youtube-player:focus-within{outline: 2px solid currentColor;outline-offset: 5px;}.rll-youtube-player iframe{position:absolute;top:0;left:0;width:100%;height:100%;z-index:100;background:0 0}.rll-youtube-player img{bottom:0;display:block;left:0;margin:auto;max-width:100%;width:100%;position:absolute;right:0;top:0;border:none;height:auto;-webkit-transition:.4s all;-moz-transition:.4s all;transition:.4s all}.rll-youtube-player img:hover{-webkit-filter:brightness(75%)}.rll-youtube-player .play{height:100%;width:100%;left:0;top:0;position:absolute;background:var(--wpr-bg-ec9b1955-d51a-4067-a946-d33401ce10c1) no-repeat center;background-color: transparent !important;cursor:pointer;border:none;}
</style>
<link data-minify="1" rel='stylesheet' id='elementor-gf-local-roboto-css' href='https://lopokopi.co/wp-content/cache/min/1/wp-content/uploads/elementor/google-fonts/css/roboto.css?ver=1744360496' media='all' />
<link data-minify="1" rel='stylesheet' id='elementor-gf-local-robotoslab-css' href='https://lopokopi.co/wp-content/cache/min/1/wp-content/uploads/elementor/google-fonts/css/robotoslab.css?ver=1744360496' media='all' />
<link data-minify="1" rel='stylesheet' id='elementor-gf-local-poppins-css' href='https://lopokopi.co/wp-content/cache/min/1/wp-content/uploads/elementor/google-fonts/css/poppins.css?ver=1744360496' media='all' />
<!--[if IE]>
<script src="https://lopokopi.co/wp-content/themes/astra/assets/js/minified/flexibility.min.js?ver=4.11.1" id="astra-flexibility-js"></script>
<script id="astra-flexibility-js-after">
flexibility(document.documentElement);</script>
<![endif]-->
<script src="https://lopokopi.co/wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js" data-rocket-defer defer></script>
<script src="https://lopokopi.co/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1" id="jquery-migrate-js" data-rocket-defer defer></script>
<script type="rocketlazyloadscript" data-rocket-src="https://lopokopi.co/wp-content/plugins/elementor/assets/lib/font-awesome/js/v4-shims.min.js?ver=3.29.0" id="font-awesome-4-shim-js" data-rocket-defer defer></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-src="https://lopokopi.co/wp-content/cache/min/1/wp-content/plugins/sticky-header-effects-for-elementor/assets/js/she-header.js?ver=1744360497" id="she-header-js" data-rocket-defer defer></script>
<link rel="https://api.w.org/" href="https://lopokopi.co/wp-json/" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://lopokopi.co/xmlrpc.php?rsd" />
<meta name="generator" content="WordPress 6.8.1" />
<link rel='shortlink' href='index.html' />
<!-- HFCM by 99 Robots - Snippet # 3: Google Tag Manager Header -->
<!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
<!-- /end HFCM by 99 Robots -->
<meta name="generator" content="Elementor 3.29.0; features: e_font_icon_svg, e_local_google_fonts; settings: css_print_method-external, google_font-enabled, font_display-auto">
<!-- Meta Pixel Code -->
<script type="rocketlazyloadscript" data-rocket-type='text/javascript'>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js?v=next');
</script>
<!-- End Meta Pixel Code -->
      <script type="rocketlazyloadscript" data-rocket-type='text/javascript'>
        var url = window.location.origin + '?ob=open-bridge';
        fbq('set', 'openbridge', '485650950251478', url);
      </script>
    <script type="rocketlazyloadscript" data-rocket-type='text/javascript'>fbq('init', '485650950251478', {}, {
    "agent": "wordpress-6.8.1-4.0.1"
})</script><script type="rocketlazyloadscript" data-rocket-type='text/javascript'>
    fbq('track', 'PageView', []);
  </script>
<!-- Meta Pixel Code -->
<noscript>
<img height="1" width="1" style="display:none" alt="fbpx"
src="https://www.facebook.com/tr?id=485650950251478&ev=PageView&noscript=1" />
</noscript>
<!-- End Meta Pixel Code -->
			<style>
				.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
				.e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
					background-image: none !important;
				}
				@media screen and (max-height: 1024px) {
					.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
					.e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
						background-image: none !important;
					}
				}
				@media screen and (max-height: 640px) {
					.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
					.e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
						background-image: none !important;
					}
				}
			</style>
			<script id="google_gtagjs" src="https://www.googletagmanager.com/gtag/js?id=G-PHF0ZMMRWH" async></script>
<script id="google_gtagjs-inline">
window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'G-PHF0ZMMRWH', {} );
</script>
<link rel="icon" href="https://lopokopi.co/wp-content/uploads/2024/08/cropped-android-chrome-512x512-1-32x32.png" sizes="32x32" />
<link rel="icon" href="https://lopokopi.co/wp-content/uploads/2024/08/cropped-android-chrome-512x512-1-192x192.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://lopokopi.co/wp-content/uploads/2024/08/cropped-android-chrome-512x512-1-180x180.png" />
<meta name="msapplication-TileImage" content="https://lopokopi.co/wp-content/uploads/2024/08/cropped-android-chrome-512x512-1-270x270.png" />
		<style id="wp-custom-css">
			body.page-id-36813 .button-wa {
    display: none !important;
}
body.page-id-36743 .button-wa {
    display: none !important;
}
body.page-id-34278 .button-wa {
    display: none !important;
}
body.page-id-33913 .button-wa {
    display: none !important;
}
body.page-id-33272 .button-wa {
    display: none !important;
}
body.page-id-33898 .button-wa {
    display: none !important;
}
body.page-id-37151 .button-wa {
    display: none !important;
}
body.page-id-37862 .button-wa {
    display: none !important;
}
body.page-id-38320 .button-wa {
    display: none !important;
}
body.page-id-31256 .button-wa {
    display: none !important;
}
body.page-id-37252 .button-wa {
    display: none !important;
}
body.page-id-37247 .button-wa {
    display: none !important;
}
body.page-id-40233 .button-wa {
    display: none !important;
}
body.page-id-40137 .button-wa {
    display: none !important;
}
.scf-widget {
  display: none !important;
}
body.page-id-40580 .button-wa {
    display: none !important;
}
body.page-id-38354 .button-wa {
    display: none !important;
}
body.page-id-41073 .button-wa {
    display: none !important;
}
body.page-id-41625 .button-wa {
    display: none !important;
}
body.page-id-41766 .button-wa {
    display: none !important;
}
body.page-id-41683 .button-wa {
    display: none !important;
}
body.page-id-41776 .button-wa {
    display: none !important;
}
body.page-id-41892 .button-wa {
    display: none !important;
}
body.page-id-41969 .button-wa {
    display: none !important;
}
body.page-id-42162 .button-wa {
    display: none !important;
}
body.page-id-42205 .button-wa {
    display: none !important;
}
body.page-id-42199 .button-wa {
    display: none !important;
}
body.page-id-42215 .button-wa {
    display: none !important;
}
body.page-id-42223 .button-wa {
    display: none !important;
}
body.page-id-42248 .button-wa {
    display: none !important;
}
body.page-id-42344 .button-wa {
    display: none !important;
}
body.page-id-42356 .button-wa {
    display: none !important;
}
body.page-id-38354 .formychat-widgets {
    display: none !important;
}
body.page-id-42344 .formychat-widgets {
    display: none !important;
}
body.page-id-42356 .formychat-widgets {
    display: none !important;
}
body.page-id-42248 .formychat-widgets {
    display: none !important;
}
body.page-id-42223 .formychat-widgets {
    display: none !important;
}
body.page-id-42215 .formychat-widgets {
    display: none !important;
}
body.page-id-42205 .formychat-widgets {
    display: none !important;
}
body.page-id-42199 .formychat-widgets {
    display: none !important;
}
body.page-id-42162 .formychat-widgets {
    display: none !important;
}
body.page-id-41969 .formychat-widgets {
    display: none !important;
}
body.page-id-41892 .formychat-widgets {
    display: none !important;
}
body.page-id-41814 .formychat-widgets {
    display: none !important;
}
body.page-id-41776 .formychat-widgets {
    display: none !important;
}
body.page-id-41766 .formychat-widgets {
    display: none !important;
}
body.page-id-41683 .formychat-widgets {
    display: none !important;
}
body.page-id-41625 .formychat-widgets {
    display: none !important;
}
body.page-id-41073 .formychat-widgets {
    display: none !important;
}
body.page-id-40580 .formychat-widgets {
    display: none !important;
}
body.page-id-382 .formychat-widgets {
    display: none !important;
}
body.page-id-41814 .button-wa {
    display: none !important;
}
body.page-id-43824 .button-wa {
    display: none !important;
}
body.page-id-44479 .button-wa {
    display: none !important;
}
body.page-id-45831 .button-wa {
    display: none !important;
}
body.page-id-45248 .button-wa {
    display: none !important;
}
body.page-id-46305 .button-wa {
    display: none !important;
}
body.page-id-46899 .button-wa {
    display: none !important;
}
body.page-id-46922 .button-wa {
    display: none !important;
}
body.page-id-47266 .button-wa {
    display: none !important;
}
body.page-id-47444 .button-wa {
    display: none !important;
}
body.page-id-47430 .button-wa {
    display: none !important;
}
body.page-id-47422 .button-wa {
    display: none !important;
}
body.page-id-47417 .button-wa {
    display: none !important;
}
body.page-id-47412 .button-wa {
    display: none !important;
}
body.page-id-47412 .button-wa {
    display: none !important;
}
body.page-id-47398 .button-wa {
    display: none !important;
}
body.page-id-50058 .button-wa {
    display: none !important;
}
body.page-id-52247 .button-wa {
    display: none !important;
}
body.page-id-52254 .button-wa {
    display: none !important;
}
body.page-id-52264 .button-wa {
    display: none !important;
}
body.page-id-52313 .button-wa {
    display: none !important;
}
/* Sticky Header CSS */
header.site-header {
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
}
.eael-pricing.style-1:hover {
    transform: none !important;
    box-shadow: none !important;
}		</style>
		<noscript><style id="rocket-lazyload-nojs-css">.rll-youtube-player, [data-lazy-src]{display:none !important;}</style></noscript><style id="wpr-lazyload-bg-container"></style><style id="wpr-lazyload-bg-exclusion"></style>
<noscript>
<style id="wpr-lazyload-bg-nostyle">.rll-youtube-player .play{--wpr-bg-ec9b1955-d51a-4067-a946-d33401ce10c1: url('https://lopokopi.co/wp-content/plugins/wp-rocket/assets/img/youtube.png');}</style>
</noscript>
<script type="application/javascript">const rocket_pairs = [{"selector":".rll-youtube-player .play","style":".rll-youtube-player .play{--wpr-bg-ec9b1955-d51a-4067-a946-d33401ce10c1: url('https:\/\/lopokopi.co\/wp-content\/plugins\/wp-rocket\/assets\/img\/youtube.png');}","hash":"ec9b1955-d51a-4067-a946-d33401ce10c1","url":"https:\/\/lopokopi.co\/wp-content\/plugins\/wp-rocket\/assets\/img\/youtube.png"}]; const rocket_excluded_pairs = [];</script><meta name="generator" content="WP Rocket 3.18.3" data-wpr-features="wpr_lazyload_css_bg_img wpr_delay_js wpr_defer_js wpr_minify_js wpr_lazyload_images wpr_lazyload_iframes wpr_oci wpr_cache_webp wpr_minify_css wpr_preload_links wpr_desktop" /></head>
<body itemtype='https://schema.org/WebPage' itemscope='itemscope' class="home wp-singular page-template-default page page-id-46230 wp-custom-logo wp-theme-astra ast-desktop ast-page-builder-template ast-no-sidebar astra-4.11.1 group-blog ast-single-post ast-inherit-site-logo-transparent ast-hfb-header ast-full-width-layout ast-inherit-site-logo-sticky ast-primary-sticky-enabled elementor-default elementor-kit-6 elementor-page elementor-page-46230 astra-addon-4.11.0">
<a
	class="skip-link screen-reader-text"
	href="#content"
	title="Skip to content">
		Skip to content</a>
@yield('content')
</body>
</html>