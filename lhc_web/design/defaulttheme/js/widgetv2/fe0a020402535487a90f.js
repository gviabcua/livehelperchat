(window.webpackJsonpLiveHelperChat=window.webpackJsonpLiveHelperChat||[]).push([[5],{32:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.nodeJSChat=void 0;var o=function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}(),a=n(1);var s=new(function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.params={},this.attributes=null,this.chatEvents=null}return o(e,[{key:"setParams",value:function(e,t,o){this.params=e,this.attributes=t,this.chatEvents=o;var s=this.attributes.userSession.getVID(),r={hostname:e.hostname,path:e.path,authTokenName:"socketCluster.authToken_vi"};""!=e.port&&(r.port=parseInt(e.port)),1==e.secure&&(r.secure=!0);var i=n(42).connect(r);function c(){var e=i.subscribe("uo_"+s);e.on("subscribeFail",(function(e){console.error("Failed to subscribe to the sample channel due to error: "+e)})),e.watch((function(e){"check_message"==e.op&&t.eventEmitter.emitEvent("checkMessageOperator")}))}i.on("error",(function(e){console.error(e)}));var u="uo_"+s;i.on("deauthenticate",(function(){a.helperFunctions.makeRequest(t.LHC_API.args.lhc_base_url+t.lang+"nodejshelper/tokenvisitor",{params:{ts:(new Date).getTime()}},(function(e){i.emit("login",{hash:e,chanelName:u},(function(e){e&&(console.log(e),i.destroy())}))}))})),i.on("connect",(function(e){e.isAuthenticated?(c(),t.LHC_API.args.check_messages=!1):a.helperFunctions.makeRequest(t.LHC_API.args.lhc_base_url+t.lang+"nodejshelper/tokenvisitor",{params:{ts:(new Date).getTime()}},(function(e){i.emit("login",{hash:e,chanelName:u},(function(e){e?console.log(e):(c(),t.LHC_API.args.check_messages=!1)}))}))}))}}]),e}());t.nodeJSChat=s}}]);
//# sourceMappingURL=fe0a020402535487a90f.js.map