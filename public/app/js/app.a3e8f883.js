(function(e){function t(t){for(var a,o,l=t[0],s=t[1],i=t[2],u=0,d=[];u<l.length;u++)o=l[u],Object.prototype.hasOwnProperty.call(r,o)&&r[o]&&d.push(r[o][0]),r[o]=0;for(a in s)Object.prototype.hasOwnProperty.call(s,a)&&(e[a]=s[a]);p&&p(t);while(d.length)d.shift()();return c.push.apply(c,i||[]),n()}function n(){for(var e,t=0;t<c.length;t++){for(var n=c[t],a=!0,o=1;o<n.length;o++){var l=n[o];0!==r[l]&&(a=!1)}a&&(c.splice(t--,1),e=s(s.s=n[0]))}return e}var a={},o={app:0},r={app:0},c=[];function l(e){return s.p+"js/"+({}[e]||e)+"."+{"chunk-0d7da4b3":"ca01b465","chunk-1428c7b1":"f9ab14bd","chunk-3a79a4a0":"b66a43e5","chunk-5506e380":"0de3efd6"}[e]+".js"}function s(t){if(a[t])return a[t].exports;var n=a[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,s),n.l=!0,n.exports}s.e=function(e){var t=[],n={"chunk-1428c7b1":1,"chunk-3a79a4a0":1};o[e]?t.push(o[e]):0!==o[e]&&n[e]&&t.push(o[e]=new Promise((function(t,n){for(var a="css/"+({}[e]||e)+"."+{"chunk-0d7da4b3":"31d6cfe0","chunk-1428c7b1":"468eb3ea","chunk-3a79a4a0":"3b0b9dcb","chunk-5506e380":"31d6cfe0"}[e]+".css",r=s.p+a,c=document.getElementsByTagName("link"),l=0;l<c.length;l++){var i=c[l],u=i.getAttribute("data-href")||i.getAttribute("href");if("stylesheet"===i.rel&&(u===a||u===r))return t()}var d=document.getElementsByTagName("style");for(l=0;l<d.length;l++){i=d[l],u=i.getAttribute("data-href");if(u===a||u===r)return t()}var p=document.createElement("link");p.rel="stylesheet",p.type="text/css",p.onload=t,p.onerror=function(t){var a=t&&t.target&&t.target.src||r,c=new Error("Loading CSS chunk "+e+" failed.\n("+a+")");c.code="CSS_CHUNK_LOAD_FAILED",c.request=a,delete o[e],p.parentNode.removeChild(p),n(c)},p.href=r;var b=document.getElementsByTagName("head")[0];b.appendChild(p)})).then((function(){o[e]=0})));var a=r[e];if(0!==a)if(a)t.push(a[2]);else{var c=new Promise((function(t,n){a=r[e]=[t,n]}));t.push(a[2]=c);var i,u=document.createElement("script");u.charset="utf-8",u.timeout=120,s.nc&&u.setAttribute("nonce",s.nc),u.src=l(e);var d=new Error;i=function(t){u.onerror=u.onload=null,clearTimeout(p);var n=r[e];if(0!==n){if(n){var a=t&&("load"===t.type?"missing":t.type),o=t&&t.target&&t.target.src;d.message="Loading chunk "+e+" failed.\n("+a+": "+o+")",d.name="ChunkLoadError",d.type=a,d.request=o,n[1](d)}r[e]=void 0}};var p=setTimeout((function(){i({type:"timeout",target:u})}),12e4);u.onerror=u.onload=i,document.head.appendChild(u)}return Promise.all(t)},s.m=e,s.c=a,s.d=function(e,t,n){s.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},s.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},s.t=function(e,t){if(1&t&&(e=s(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(s.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)s.d(n,a,function(t){return e[t]}.bind(null,a));return n},s.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return s.d(t,"a",t),t},s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},s.p="/app/",s.oe=function(e){throw console.error(e),e};var i=window["webpackJsonp"]=window["webpackJsonp"]||[],u=i.push.bind(i);i.push=t,i=i.slice();for(var d=0;d<i.length;d++)t(i[d]);var p=u;c.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"299a":function(e,t,n){"use strict";n("9de9")},"33b5":function(e,t,n){"use strict";var a=n("7a23"),o=n("a18c"),r=n("bc3a"),c=n.n(r),l=n("e01f");const s=Object(a["reactive"])({authenticated:!1,user:null,access_token:null,loading:!1,status:null}),i=async e=>{await c.a.get("/sanctum/csrf-cookie"),await c.a.post("/api/login",e).then(e=>{e.data.token&&(s.access_token=e.data.token,o["a"].push("/"))}).catch(({response:e})=>{ElNotification({title:"Error:",dangerouslyUseHTMLString:!0,message:l["a"].getErrorsMessage(e),type:"error",duration:6e3})}),u()},u=async()=>c()({method:"post",url:"/api/auth-user"}).then(e=>{s.authenticated=!0,s.user=e.data.user}).catch(()=>{s.authenticated=!1,s.user=null}),d=async e=>(s.loading=!0,c()({method:"post",url:"/api/register",data:e}).then(e=>{s.loading=!1,200===e.status&&o["a"].push("/login").then(()=>{ElNotification({title:"Success",active:!0,type:"success",message:"registration was successful",duration:3e3})})}).catch(({response:e})=>{ElNotification({title:"Error:",dangerouslyUseHTMLString:!0,message:l["a"].getErrorsMessage(e),type:"error",duration:6e3})})),p=async()=>{await c()({method:"post",url:"/api/logout",data:{token_id:10}}),s.user=null,s.authenticated=!1,s.access_token=null,o["a"].push("/login")};t["a"]=()=>({access_token:Object(a["toRef"])(s,"access_token"),authenticated:Object(a["toRef"])(s,"authenticated"),user:Object(a["toRef"])(s,"user"),loading:Object(a["toRef"])(s,"loading"),status:Object(a["toRef"])(s,"status"),me:u,login:i,register:d,logout:p})},"56d7":function(e,t,n){"use strict";n.r(t);var a=n("7a23"),o=n("33b5");const r={class:"position-sticky pt-3"},c={class:"nav flex-column"},l={class:"nav-item"};var s={props:{collapse:{type:Boolean,default:!0},items:{type:Array,required:!0}},setup(e){return(t,n)=>{const o=Object(a["resolveComponent"])("icon"),s=Object(a["resolveComponent"])("router-link");return Object(a["openBlock"])(),Object(a["createElementBlock"])("nav",{id:"sidebarMenu",class:Object(a["normalizeClass"])([e.collapse?"collapse":"","col-md-3 col-lg-2 d-md-block bg-light sidebar"])},[Object(a["createElementVNode"])("div",r,[Object(a["createElementVNode"])("ul",c,[Object(a["createElementVNode"])("li",l,[(Object(a["openBlock"])(!0),Object(a["createElementBlock"])(a["Fragment"],null,Object(a["renderList"])(e.items,(e,n)=>(Object(a["openBlock"])(),Object(a["createBlock"])(s,{key:n,to:{name:e.to,params:t.$route.params},class:Object(a["normalizeClass"])([t.$route.name==e.to?"active":"","nav-link text-center"])},{default:Object(a["withCtx"])(()=>[Object(a["createVNode"])(o,{name:e.icon},null,8,["name"]),Object(a["createTextVNode"])(" "+Object(a["toDisplayString"])(e.title),1)]),_:2},1032,["to","class"]))),128))])])])],2)}}};n("7d93");const i=s;var u=i;const d=Object(a["reactive"])({menu:[{title:"home",to:"search",icon:""},{title:"dialogs",to:"dialogs",icon:""}]});var p=()=>({...Object(a["toRefs"])(d)});const b={class:"navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"},m=Object(a["createElementVNode"])("a",{class:"navbar-brand col-md-3 col-lg-2 me-0 px-3",href:"#"},"Chat-Service",-1),f=Object(a["createElementVNode"])("span",{class:"navbar-toggler-icon"},null,-1),g=[f],v={class:"navbar-nav"},O=Object(a["createElementVNode"])("div",{class:"nav-link px-3"},"Sign out",-1),h=[O],j={class:"container-fluid"},k={class:"row"},E={class:"col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4"};var y={setup(e){const{logout:t}=Object(o["a"])(),{menu:n}=p(),r=Object(a["ref"])({collapse:!0});return(e,o)=>{const c=Object(a["resolveComponent"])("router-view");return Object(a["openBlock"])(),Object(a["createElementBlock"])("div",null,[Object(a["createElementVNode"])("header",b,[m,Object(a["createElementVNode"])("button",{onClick:o[0]||(o[0]=e=>r.value.collapse=!r.value.collapse),class:"navbar-toggler d-md-none collapsed",type:"button","aria-expanded":"false","aria-label":"Toggle navigation"},g),Object(a["createElementVNode"])("div",v,[Object(a["createElementVNode"])("div",{onClick:o[1]||(o[1]=e=>Object(a["unref"])(t)()),class:"nav-item text-nowrap cursor-pointer"},h)])]),Object(a["createElementVNode"])("div",j,[Object(a["createElementVNode"])("div",k,[Object(a["createVNode"])(Object(a["unref"])(u),{collapse:r.value.collapse,items:Object(a["unref"])(n)},null,8,["collapse","items"]),Object(a["createElementVNode"])("main",E,[Object(a["createVNode"])(c)])])])])}}};const w=y;var N=w;const S={class:"w-app"},B={key:0};var V={setup(e){const{user:t,loading:n}=Object(o["a"])();return(e,o)=>{const r=Object(a["resolveComponent"])("router-view");return Object(a["openBlock"])(),Object(a["createElementBlock"])("div",S,[Object(a["unref"])(t)?(Object(a["openBlock"])(),Object(a["createElementBlock"])("div",{key:1,fill:"",class:Object(a["normalizeClass"])(["height-100",{loading:Object(a["unref"])(n)}])},[Object(a["createVNode"])(Object(a["unref"])(N))],2)):(Object(a["openBlock"])(),Object(a["createElementBlock"])("div",B,[Object(a["createVNode"])(r)]))])}}};const _=V;var C=_,x=n("bc3a"),P=n.n(x),T=n("c3a1"),M=n("a18c"),A=n("2295");P.a.defaults.withCredentials=!0,P.a.defaults.baseURL="";const L=Object(a["createApp"])(C);L.use(T["a"]),L.use(M["a"]),window.axios=P.a,window.ElNotification=A["a"];var R=L;n("7a1d"),n("df25");function U(e,t,n,o,r,c){return Object(a["openBlock"])(),Object(a["createElementBlock"])("i",{class:Object(a["normalizeClass"])(n.name),style:Object(a["normalizeStyle"])({fontSize:n.size+"px",color:n.color})},null,6)}var z={props:{name:{required:!0},color:{defautl:null},size:{type:Number,default:16}}},H=n("6b0d"),I=n.n(H);const q=I()(z,[["render",U]]);var D=q;const $={class:"inf-scroll-comp-root"};var F={props:{id:{type:String,required:!0},page:{required:!0},topScroll:{type:Boolean,default:!1}},emits:["loadData"],setup(e,{emit:t}){const n=e,o=Object(a["ref"])(null),r=Object(a["ref"])(""),c=Object(a["reactive"])({listEndObserver:null,loading:!1,previousScrollHeightMinusScrollTop:0,lastId:null,lastPage:null});Object(a["onMounted"])(()=>{Object(a["nextTick"])().then(()=>{i()})}),Object(a["onBeforeUnmount"])(()=>{c.listEndObserver&&c.listEndObserver.disconnect()});const l=()=>{let e=o.value;c.previousScrollHeightMinusScrollTop=e.scrollHeight-e.scrollTop},s=()=>{Object(a["nextTick"])(()=>{let e=o.value;e.scrollTop=e.scrollHeight-c.previousScrollHeightMinusScrollTop})},i=()=>{let e={root:o.value,margin:"10px"};c.listEndObserver=new IntersectionObserver(u,e),c.listEndObserver.observe(r.value)},u=()=>{c.loading||(c.loading=!0,t("loadData"),l())};return Object(a["onUpdated"])(async()=>{n.topScroll&&(c.lastId!=n.id&&s(),n.page!==c.lastPage&&s(),c.loading=!1,c.lastPage=n.page,c.lastId=n.id)}),(t,n)=>(Object(a["openBlock"])(),Object(a["createElementBlock"])("div",$,[Object(a["createElementVNode"])("div",{class:"scroll-container",ref:(e,t)=>{t["scrollContainer"]=e,o.value=e}},[e.topScroll?(Object(a["openBlock"])(),Object(a["createElementBlock"])("div",{key:0,class:"trigger",ref:(e,t)=>{t["trigger"]=e,r.value=e}},null,512)):Object(a["createCommentVNode"])("",!0),Object(a["createElementVNode"])("div",{class:"list-container",ref:(e,t)=>{t["listContainer"]=e}},[Object(a["renderSlot"])(t.$slots,"content",{id:e.id})],512),e.topScroll?Object(a["createCommentVNode"])("",!0):(Object(a["openBlock"])(),Object(a["createElementBlock"])("div",{key:1,class:"trigger",ref:(e,t)=>{t["trigger"]=e,r.value=e}},null,512))],512)]))}};n("299a");const J=I()(F,[["__scopeId","data-v-0bd1325a"]]);var K=J;R.component("icon",D),R.component("InfiniteScroll",K),R.mount("#app")},"7a1d":function(e,t,n){},"7d93":function(e,t,n){"use strict";n("97f1")},"97f1":function(e,t,n){},"9de9":function(e,t,n){},a18c:function(e,t,n){"use strict";var a=n("6c02"),o=[{path:"/login",name:"login",props:{active:"login"},component:()=>n.e("chunk-0d7da4b3").then(n.bind(null,"9905"))},{path:"/register",name:"register",props:{active:"signup"},component:()=>n.e("chunk-5506e380").then(n.bind(null,"e607"))}],r=n("33b5");const c=[...o,{path:"/",name:"search",component:()=>n.e("chunk-3a79a4a0").then(n.bind(null,"423b"))},{path:"/dialogs/:id?",name:"dialogs",component:()=>n.e("chunk-1428c7b1").then(n.bind(null,"b0b4"))}],l=Object(a["a"])({history:Object(a["b"])(Object({NODE_ENV:"production",VUE_APP_SERVER:"",VUE_APP_SOCKET_URL:"localhost:6001",BASE_URL:"/app/"}).VUE_APP_BASE_URL),routes:c});l.beforeEach(async(e,t,n)=>{const{user:a,me:o}=Object(r["a"])(),c=["login","register"];a.value||await o(),c.includes(e.name)||a.value||n("/login"),"login"===e.name&&a.value&&n("/"),n()});t["a"]=l},df25:function(e,t,n){},e01f:function(e,t,n){"use strict";t["a"]={getErrorsMessage(e){let t="<ul>";return e.data.errors?Object.values(e.data.errors).forEach(e=>{e.forEach(e=>{t+=`<li>${e}</li>`})}):t="something went wrong",t+"</ul>"},sliceWord(e,t=30){return null===e?"":(e.length>=t&&(e=e.slice(0,t),e+="..."),e)}}}});