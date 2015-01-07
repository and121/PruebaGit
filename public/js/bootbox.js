/**
 * bootbox.js [v4.2.0]
 *
 * http://bootboxjs.com/license.txt
 */
(function(a,b){if(typeof define==="function"&&define.amd){define(["jquery"],b)}else{if(typeof exports==="object"){module.exports=b(require("jquery"))}else{a.bootbox=b(a.jQuery)}}}(this,function init(i,c){var m={dialog:"<div class='bootbox modal' tabindex='-1' role='dialog'><div class='modal-dialog'><div class='modal-content'><div class='modal-body'><div class='bootbox-body'></div></div></div></div></div>",header:"<div class='modal-header'><h4 class='modal-title'></h4></div>",footer:"<div class='modal-footer'></div>",closeButton:"<button type='button' class='bootbox-close-button close' data-dismiss='modal' aria-hidden='true'>&times;</button>",form:"<form class='bootbox-form'></form>",inputs:{text:"<input class='bootbox-input bootbox-input-text form-control' autocomplete=off type=text />",textarea:"<textarea class='bootbox-input bootbox-input-textarea form-control'></textarea>",email:"<input class='bootbox-input bootbox-input-email form-control' autocomplete='off' type='email' />",select:"<select class='bootbox-input bootbox-input-select form-control'></select>",checkbox:"<div class='checkbox'><label><input class='bootbox-input bootbox-input-checkbox' type='checkbox' /></label></div>",date:"<input class='bootbox-input bootbox-input-date form-control' autocomplete=off type='date' />",time:"<input class='bootbox-input bootbox-input-time form-control' autocomplete=off type='time' />",number:"<input class='bootbox-input bootbox-input-number form-control' autocomplete=off type='number' />",password:"<input class='bootbox-input bootbox-input-password form-control' autocomplete='off' type='password' />"}};var f={locale:"en",backdrop:true,animate:true,className:null,closeButton:true,show:true,container:"body"};var h={};function p(r){var q=a[f.locale];return q?q[r]:a.en[r]}function d(s,r,t){s.stopPropagation();s.preventDefault();var q=i.isFunction(t)&&t(s)===false;if(!q){r.modal("hide")}}function j(s){var q,r=0;for(q in s){r++}return r}function k(s,r){var q=0;i.each(s,function(t,u){r(t,u,q++)})}function b(q){var s;var r;if(typeof q!=="object"){throw new Error("Please supply an object of options")}if(!q.message){throw new Error("Please specify a message")}q=i.extend({},f,q);if(!q.buttons){q.buttons={}}q.backdrop=q.backdrop?"static":false;s=q.buttons;r=j(s);k(s,function(v,u,t){if(i.isFunction(u)){u=s[v]={callback:u}}if(i.type(u)!=="object"){throw new Error("button with key "+v+" must be an object")}if(!u.label){u.label=v}if(!u.className){if(r<=2&&t===r-1){u.className="btn-primary"}else{u.className="btn-default"}}});return q}function g(r,s){var t=r.length;var q={};if(t<1||t>2){throw new Error("Invalid argument length")}if(t===2||typeof r[0]==="string"){q[s[0]]=r[0];q[s[1]]=r[1]}else{q=r[0]}return q}function l(s,q,r){return i.extend(true,{},s,g(q,r))}function e(t,u,s,r){var q={className:"bootbox-"+t,buttons:o.apply(null,u)};return n(l(q,r,s),u)}function o(){var u={};for(var s=0,q=arguments.length;s<q;s++){var t=arguments[s];var r=t.toLowerCase();var v=t.toUpperCase();u[r]={label:p(v)}}return u}function n(q,s){var r={};k(s,function(t,u){r[u]=true});k(q.buttons,function(t){if(r[t]===c){throw new Error("button key "+t+" is not allowed (options are "+s.join("\n")+")")}});return q}h.alert=function(){var q;q=e("alert",["ok"],["message","callback"],arguments);if(q.callback&&!i.isFunction(q.callback)){throw new Error("alert requires callback property to be a function when provided")}q.buttons.ok.callback=q.onEscape=function(){if(i.isFunction(q.callback)){return q.callback()}return true};return h.dialog(q)};h.confirm=function(){var q;q=e("confirm",["cancel","confirm"],["message","callback"],arguments);q.buttons.cancel.callback=q.onEscape=function(){return q.callback(false)};q.buttons.confirm.callback=function(){return q.callback(true)};if(!i.isFunction(q.callback)){throw new Error("confirm requires a callback")}return h.dialog(q)};h.prompt=function(){var A;var t;var x;var q;var y;var s;var w;q=i(m.form);t={className:"bootbox-prompt",buttons:o("cancel","confirm"),value:"",inputType:"text"};A=n(l(t,arguments,["title","callback"]),["cancel","confirm"]);s=(A.show===c)?true:A.show;var v=["date","time","number"];var u=document.createElement("input");u.setAttribute("type",A.inputType);if(v[A.inputType]){A.inputType=u.type}A.message=q;A.buttons.cancel.callback=A.onEscape=function(){return A.callback(null)};A.buttons.confirm.callback=function(){var C;switch(A.inputType){case"text":case"textarea":case"email":case"select":case"date":case"time":case"number":case"password":C=y.val();break;case"checkbox":var B=y.find("input:checked");C=[];k(B,function(D,E){C.push(i(E).val())});break}return A.callback(C)};A.show=false;if(!A.title){throw new Error("prompt requires a title")}if(!i.isFunction(A.callback)){throw new Error("prompt requires a callback")}if(!m.inputs[A.inputType]){throw new Error("invalid prompt type")}y=i(m.inputs[A.inputType]);switch(A.inputType){case"text":case"textarea":case"email":case"date":case"time":case"number":case"password":y.val(A.value);break;case"select":var r={};w=A.inputOptions||[];if(!w.length){throw new Error("prompt with select requires options")}k(w,function(B,C){var D=y;if(C.value===c||C.text===c){throw new Error("given options in wrong format")}if(C.group){if(!r[C.group]){r[C.group]=i("<optgroup/>").attr("label",C.group)}D=r[C.group]}D.append("<option value='"+C.value+"'>"+C.text+"</option>")});k(r,function(B,C){y.append(C)});y.val(A.value);break;case"checkbox":var z=i.isArray(A.value)?A.value:[A.value];w=A.inputOptions||[];if(!w.length){throw new Error("prompt with checkbox requires options")}if(!w[0].value||!w[0].text){throw new Error("given options in wrong format")}y=i("<div/>");k(w,function(B,C){var D=i(m.inputs[A.inputType]);D.find("input").attr("value",C.value);D.find("label").append(C.text);k(z,function(E,F){if(F===C.value){D.find("input").prop("checked",true)}});y.append(D)});break}if(A.placeholder){y.attr("placeholder",A.placeholder)}if(A.pattern){y.attr("pattern",A.pattern)}q.append(y);q.on("submit",function(B){B.preventDefault();x.find(".btn-primary").click()});x=h.dialog(A);x.off("shown.bs.modal");x.on("shown.bs.modal",function(){y.focus()});if(s===true){x.modal("show")}return x};h.dialog=function(s){s=b(s);var t=i(m.dialog);var q=t.find(".modal-body");var w=s.buttons;var u="";var v={onEscape:s.onEscape};k(w,function(y,x){u+="<button data-bb-handler='"+y+"' type='button' class='btn "+x.className+"'>"+x.label+"</button>";v[y]=x.callback});q.find(".bootbox-body").html(s.message);if(s.animate===true){t.addClass("fade")}if(s.className){t.addClass(s.className)}if(s.title){q.before(m.header)}if(s.closeButton){var r=i(m.closeButton);if(s.title){t.find(".modal-header").prepend(r)}else{r.css("margin-top","-10px").prependTo(q)}}if(s.title){t.find(".modal-title").html(s.title)}if(u.length){q.after(m.footer);t.find(".modal-footer").html(u)}t.on("hidden.bs.modal",function(x){if(x.target===this){t.remove()}});t.on("shown.bs.modal",function(){t.find(".btn-primary:first").focus()});t.on("escape.close.bb",function(x){if(v.onEscape){d(x,t,v.onEscape)}});t.on("click",".modal-footer button",function(y){var x=i(this).data("bb-handler");d(y,t,v[x])});t.on("click",".bootbox-close-button",function(x){d(x,t,v.onEscape)});t.on("keyup",function(x){if(x.which===27){t.trigger("escape.close.bb")}});i(s.container).append(t);t.modal({backdrop:s.backdrop,keyboard:false,show:false});if(s.show){t.modal("show")}return t};h.setDefaults=function(){var q={};if(arguments.length===2){q[arguments[0]]=arguments[1]}else{q=arguments[0]}i.extend(f,q)};h.hideAll=function(){i(".bootbox").modal("hide")};var a={br:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Sim"},da:{OK:"OK",CANCEL:"Annuller",CONFIRM:"Accepter"},de:{OK:"OK",CANCEL:"Abbrechen",CONFIRM:"Akzeptieren"},en:{OK:"OK",CANCEL:"Cancel",CONFIRM:"OK"},es:{OK:"OK",CANCEL:"Cancelar",CONFIRM:"Aceptar"},fi:{OK:"OK",CANCEL:"Peruuta",CONFIRM:"OK"},fr:{OK:"OK",CANCEL:"Annuler",CONFIRM:"D'accord"},he:{OK:"××™×©×•×¨",CANCEL:"×‘×™×˜×•×œ",CONFIRM:"××™×©×•×¨"},it:{OK:"OK",CANCEL:"Annulla",CONFIRM:"Conferma"},lt:{OK:"Gerai",CANCEL:"AtÅ¡aukti",CONFIRM:"Patvirtinti"},lv:{OK:"Labi",CANCEL:"Atcelt",CONFIRM:"ApstiprinÄt"},nl:{OK:"OK",CANCEL:"Annuleren",CONFIRM:"Accepteren"},no:{OK:"OK",CANCEL:"Avbryt",CONFIRM:"OK"},pl:{OK:"OK",CANCEL:"Anuluj",CONFIRM:"PotwierdÅº"},ru:{OK:"OK",CANCEL:"ÐžÑ‚Ð¼ÐµÐ½Ð°",CONFIRM:"ÐŸÑ€Ð¸Ð¼ÐµÐ½Ð¸Ñ‚ÑŒ"},sv:{OK:"OK",CANCEL:"Avbryt",CONFIRM:"OK"},tr:{OK:"Tamam",CANCEL:"Ä°ptal",CONFIRM:"Onayla"},zh_CN:{OK:"OK",CANCEL:"å–æ¶ˆ",CONFIRM:"ç¡®è®¤"},zh_TW:{OK:"OK",CANCEL:"å–æ¶ˆ",CONFIRM:"ç¢ºèª"}};h.init=function(q){return init(q||i)};return h}));