(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{79:function(t,e,n){"use strict";n.r(e);function s(t,e){var n=Object.keys(t);if(Object.getOwnPropertySymbols){var s=Object.getOwnPropertySymbols(t);e&&(s=s.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),n.push.apply(n,s)}return n}function r(t,e,n){return e in t?Object.defineProperty(t,e,{value:n,enumerable:!0,configurable:!0,writable:!0}):t[e]=n,t}var a={data:function(){return{appointments:[],user:[],isfetching:!0,selectedAppointment:[]}},methods:{getAppointments:function(){var t=this;this.isfetching=!0,axios.get("/admin/appointment/approved/".concat(this.user.id)).then((function(e){var n=e.data;t.appointments=n,t.isfetching=!1}))},getAuthuser:function(){var t=this;axios.get("/auth/user").then((function(e){var n=e.data;console.log(n,"user"),t.user=n,t.getAppointments()}))},accept:function(t){var e=this,n=t;axios.put("/admin/accept/appointment",function(t){for(var e=1;e<arguments.length;e++){var n=null!=arguments[e]?arguments[e]:{};e%2?s(Object(n),!0).forEach((function(e){r(t,e,n[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(n)):s(Object(n)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(n,e))}))}return t}({},n)).then((function(t){t.data;e.getAppointments(),e.$toast.open({message:"Appointment of ".concat(n.lname+" "+n.fname," is successfully updated"),position:"top-right",type:"success",duration:5e3})}))}},created:function(){this.getAuthuser()}},i=n(9),o=Object(i.a)(a,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("v-card",{attrs:{elevation:"1"}},[n("v-card-title",[t._v("\n        Approval\n      ")]),t._v(" "),n("v-card-text",[n("v-simple-table",{scopedSlots:t._u([{key:"default",fn:function(){return[n("thead",[n("tr",[n("th",{staticClass:"text-left"},[t._v("\n              Name\n            ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n              Email\n            ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n              Mobile number\n            ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n              Date\n            ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n              Person to visit\n            ")]),t._v(" "),n("th",{staticClass:"text-left"},[t._v("\n              Department\n            ")]),t._v(" "),n("th",[t._v("\n              approved by\n            ")]),t._v(" "),n("th",[t._v("\n              Reason\n            ")])])]),t._v(" "),n("tbody",t._l(t.appointments,(function(e){return n("tr",{key:e.id},[n("td",[t._v(t._s(e.fname+" "+e.lname))]),t._v(" "),n("td",[t._v(t._s(e.email))]),t._v(" "),n("td",[t._v(t._s(e.mobile_number))]),t._v(" "),n("td",[t._v(t._s(e.appt_date))]),t._v(" "),n("td",[t._v(t._s(e.PTV))]),t._v(" "),n("td",[t._v(t._s(e.department.short_name))]),t._v(" "),n("td",[t._v(t._s(e.user.firstname+" "+e.user.lastname))]),t._v(" "),n("td",[t._v("\n             "+t._s(e.reason)+"\n            ")])])})),0)]},proxy:!0}])})],1)],1)],1)}),[],!1,null,null,null);e.default=o.exports}}]);