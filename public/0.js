(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/accion.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/accion.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      Roles: [],
      rol_model: {
        id: '',
        name: ''
      },
      bolean_index: true,
      bolean_insertar: false,
      bolean_edit: false
    };
  },
  created: function created() {
    var _this = this;

    axios.get("/api/consultasUsuarios").then(function (res) {
      var consultasRol = res.data;
      _this.Roles = consultasRol['roles'];
    });
  },
  methods: {
    Bolean_insertar: function Bolean_insertar() {
      this.bolean_insertar = true, this.bolean_index = false;
    },
    BDestroy: function BDestroy(id, index) {
      var _this2 = this;

      axios["delete"]("/Roles/".concat(id)).then(function (res) {
        _this2.Roles.splice(index, 1);

        $('#ELIM' + id).click();
      });
    },
    Atras: function Atras() {
      this.bolean_index = true, this.bolean_insertar = false, this.bolean_edit = false;
    },
    Editar: function Editar(item) {
      this.rol_model = {
        id: '',
        name: ''
      };
      this.bolean_index = false;
      this.bolean_crear = false;
      this.bolean_edit = true;
      this.rol_model = {
        id: item.id,
        name: item.name
      };
    },
    Bstore: function Bstore() {
      var _this3 = this;

      var formData = new FormData();
      formData.append('name', this.rol_model.name);
      axios.post('/Roles', formData).then(function (res) {
        _this3.Atras();

        _this3.Roles.push(res.data);
      });
    },
    BUpdate: function BUpdate(rol_model) {
      var _this4 = this;

      var formData = new FormData();
      formData.append("_method", "put");
      formData.append('name', this.rol_model.name);
      axios.post("/Roles/".concat(rol_model.id), formData).then(function (res) {
        _this4.Atras();

        var index = _this4.Roles.findIndex(function (item) {
          return item.id === rol_model.id;
        });

        _this4.Roles[index] = res.data;
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/accion.vue?vue&type=template&id=6fcf53b4&":
/*!****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/accion.vue?vue&type=template&id=6fcf53b4& ***!
  \****************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _vm._m(0),
    _vm._v(" "),
    _c("div", { staticClass: "panel", attrs: { id: "panel-1" } }, [
      _c("div", { staticClass: "panel-container show" }, [
        _c("div", { staticClass: "panel-content" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col" }, [
              _vm.bolean_index
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-primary waves-effect waves-themed",
                      on: {
                        click: function($event) {
                          return _vm.Bolean_insertar()
                        }
                      }
                    },
                    [_vm._v("Crear Rol")]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.bolean_insertar
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-primary waves-effect waves-themed",
                      on: {
                        click: function($event) {
                          return _vm.Atras()
                        }
                      }
                    },
                    [_vm._v("Atras")]
                  )
                : _vm._e(),
              _vm._v(" "),
              _vm.bolean_edit
                ? _c(
                    "button",
                    {
                      staticClass: "btn btn-primary waves-effect waves-themed",
                      on: {
                        click: function($event) {
                          return _vm.Atras()
                        }
                      }
                    },
                    [_vm._v("Atras")]
                  )
                : _vm._e()
            ])
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _vm.bolean_index
      ? _c("div", { staticClass: "panel", attrs: { id: "panel-1" } }, [
          _vm._m(1),
          _vm._v(" "),
          _c("div", { staticClass: "panel-container show" }, [
            _c("div", { staticClass: "panel-content" }, [
              _c("table", { staticClass: "table table-striped table-hover" }, [
                _vm._m(2),
                _vm._v(" "),
                _c(
                  "tbody",
                  _vm._l(_vm.Roles, function(item, index) {
                    return _c("tr", { key: index }, [
                      _c("td", { staticClass: "center" }, [
                        _vm._v(_vm._s(item.id))
                      ]),
                      _vm._v(" "),
                      _c("td", { staticClass: "center" }, [
                        _vm._v(_vm._s(item.name))
                      ]),
                      _vm._v(" "),
                      _c("td", { staticClass: "center" }, [
                        _c(
                          "button",
                          {
                            staticClass: "btn btn-secondary",
                            attrs: { type: "button" },
                            on: {
                              click: function($event) {
                                return _vm.Editar(item)
                              }
                            }
                          },
                          [_c("i", { staticClass: "fa fa-edit" })]
                        )
                      ]),
                      _vm._v(" "),
                      _c("td", { staticClass: "center" }, [
                        _c(
                          "button",
                          {
                            staticClass: "btn btn-danger",
                            attrs: {
                              "data-toggle": "modal",
                              "data-target": "#ELIM" + item.id
                            }
                          },
                          [_c("i", { staticClass: "fa fa-trash" })]
                        )
                      ]),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass: "modal modal-alert fade",
                          attrs: {
                            id: "ELIM" + item.id,
                            tabindex: "-1",
                            role: "dialog",
                            "aria-hidden": "true"
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "modal-dialog modal-dialog-centered",
                              attrs: { role: "document" }
                            },
                            [
                              _c("div", { staticClass: "modal-content" }, [
                                _c("div", { staticClass: "modal-header" }, [
                                  _c("h5", { staticClass: "modal-title" }, [
                                    _vm._v("Eliminar a " + _vm._s(item.name))
                                  ]),
                                  _vm._v(" "),
                                  _vm._m(3, true)
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "modal-body" }, [
                                  _vm._v(
                                    "\n                                        Esta accion no se puede deshacer\n                                    "
                                  )
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "modal-footer" }, [
                                  _c(
                                    "button",
                                    {
                                      staticClass: "btn btn-secondary",
                                      attrs: {
                                        type: "button",
                                        "data-dismiss": "modal"
                                      }
                                    },
                                    [_vm._v("Close")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "button",
                                    {
                                      staticClass: "btn btn-primary",
                                      attrs: { type: "button" },
                                      on: {
                                        click: function($event) {
                                          return _vm.BDestroy(item.id, index)
                                        }
                                      }
                                    },
                                    [_vm._v("Continuar")]
                                  )
                                ])
                              ])
                            ]
                          )
                        ]
                      )
                    ])
                  }),
                  0
                )
              ])
            ])
          ])
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.bolean_insertar
      ? _c("div", { staticClass: "panel col-md-6", attrs: { id: "panel-1" } }, [
          _vm._m(4),
          _vm._v(" "),
          _c("div", { staticClass: "panel-container show" }, [
            _c("div", { staticClass: "panel-content" }, [
              _c("div", { staticClass: "row" }, [
                _c(
                  "form",
                  {
                    staticStyle: { width: "100%" },
                    on: {
                      submit: function($event) {
                        $event.preventDefault()
                        return _vm.Bstore()
                      }
                    }
                  },
                  [
                    _c("div", { staticClass: "row" }, [
                      _c(
                        "div",
                        {
                          staticClass: "col-md-12 mb-15",
                          attrs: { id: "app_ticket" }
                        },
                        [
                          _c("div", { staticClass: "row" }, [
                            _c("div", { staticClass: "col-12 mb-15" }, [
                              _c("div", { staticClass: "form-group" }, [
                                _c(
                                  "label",
                                  {
                                    staticClass: "form-label",
                                    attrs: { for: "name" }
                                  },
                                  [_vm._v("Descripcion")]
                                ),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.rol_model.name,
                                      expression: "rol_model.name"
                                    }
                                  ],
                                  staticClass: " form-control",
                                  attrs: {
                                    name: "name",
                                    type: "text",
                                    value: "",
                                    placeholder: "Descripcion",
                                    required: ""
                                  },
                                  domProps: { value: _vm.rol_model.name },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.rol_model,
                                        "name",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c("div", { staticClass: "invalid-feedback" }, [
                                  _vm._v("Este campo es obligatorio")
                                ])
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _vm._m(5)
                        ]
                      )
                    ])
                  ]
                )
              ])
            ])
          ])
        ])
      : _vm._e(),
    _vm._v(" "),
    _vm.bolean_edit
      ? _c("div", { staticClass: "panel col-md-6", attrs: { id: "panel-1" } }, [
          _vm._m(6),
          _vm._v(" "),
          _c("div", { staticClass: "panel-container show" }, [
            _c("div", { staticClass: "panel-content" }, [
              _c("div", { staticClass: "row" }, [
                _c(
                  "form",
                  {
                    staticStyle: { width: "100%" },
                    on: {
                      submit: function($event) {
                        $event.preventDefault()
                        return _vm.BUpdate(_vm.rol_model)
                      }
                    }
                  },
                  [
                    _c("div", { staticClass: "row" }, [
                      _c(
                        "div",
                        {
                          staticClass: "col-md-12 mb-15",
                          attrs: { id: "app_ticket" }
                        },
                        [
                          _c("div", { staticClass: "row" }, [
                            _c("div", { staticClass: "col-sm-12 mb-15" }, [
                              _c("div", { staticClass: "form-group" }, [
                                _c(
                                  "label",
                                  {
                                    staticClass: "form-label",
                                    attrs: { for: "name" }
                                  },
                                  [_vm._v("Descripcion")]
                                ),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.rol_model.name,
                                      expression: "rol_model.name"
                                    }
                                  ],
                                  staticClass: " form-control",
                                  attrs: {
                                    name: "descripcion",
                                    type: "text",
                                    value: "",
                                    placeholder: "Descripcion",
                                    required: ""
                                  },
                                  domProps: { value: _vm.rol_model.name },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.rol_model,
                                        "name",
                                        $event.target.value
                                      )
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c("div", { staticClass: "invalid-feedback" }, [
                                  _vm._v("Este campo es obligatorio")
                                ])
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _vm._m(7)
                        ]
                      )
                    ])
                  ]
                )
              ])
            ])
          ])
        ])
      : _vm._e()
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("ol", { staticClass: "breadcrumb page-breadcrumb" }, [
      _c("li", { staticClass: "breadcrumb-item" }, [_vm._v("Home")]),
      _vm._v(" "),
      _c("li", { staticClass: "breadcrumb-item" }, [_vm._v("Crear criterio")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-hdr" }, [
      _c("h2", [
        _c("span", { staticClass: "fw-300" }, [_c("i", [_vm._v("Roles")])])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", [
        _c("th", { staticClass: "center", staticStyle: { width: "20%" } }, [
          _vm._v("Id")
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "center", staticStyle: { width: "35%" } }, [
          _vm._v("Descripcion")
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "center", staticStyle: { width: "10%" } }, [
          _c("i", { staticClass: "fa fa-pencil" })
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "center", staticStyle: { width: "10%" } }, [
          _c("i", { staticClass: "fa fa-trash" })
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: {
          type: "button",
          "data-dismiss": "modal",
          "aria-label": "Close"
        }
      },
      [
        _c("span", { attrs: { "aria-hidden": "true" } }, [
          _c("i", { staticClass: "fal fa-times" })
        ])
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-hdr" }, [
      _c("h2", [
        _c("span", { staticClass: "fw-300" }, [_c("i", [_vm._v("Crear")])])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-12" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-primary float-right",
          attrs: { type: "submit" }
        },
        [_vm._v("Guardar")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "panel-hdr" }, [
      _c("h2", [
        _c("span", { staticClass: "fw-300" }, [_c("i", [_vm._v("Editar")])])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-md-12" }, [
      _c(
        "button",
        {
          staticClass: "btn btn-primary float-right",
          attrs: { type: "submit" }
        },
        [_vm._v("Guardar")]
      )
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/accion.vue":
/*!***************************************!*\
  !*** ./resources/js/views/accion.vue ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _accion_vue_vue_type_template_id_6fcf53b4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./accion.vue?vue&type=template&id=6fcf53b4& */ "./resources/js/views/accion.vue?vue&type=template&id=6fcf53b4&");
/* harmony import */ var _accion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./accion.vue?vue&type=script&lang=js& */ "./resources/js/views/accion.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _accion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _accion_vue_vue_type_template_id_6fcf53b4___WEBPACK_IMPORTED_MODULE_0__["render"],
  _accion_vue_vue_type_template_id_6fcf53b4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/accion.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/accion.vue?vue&type=script&lang=js&":
/*!****************************************************************!*\
  !*** ./resources/js/views/accion.vue?vue&type=script&lang=js& ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_accion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./accion.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/accion.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_accion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/accion.vue?vue&type=template&id=6fcf53b4&":
/*!**********************************************************************!*\
  !*** ./resources/js/views/accion.vue?vue&type=template&id=6fcf53b4& ***!
  \**********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_accion_vue_vue_type_template_id_6fcf53b4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./accion.vue?vue&type=template&id=6fcf53b4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/accion.vue?vue&type=template&id=6fcf53b4&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_accion_vue_vue_type_template_id_6fcf53b4___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_accion_vue_vue_type_template_id_6fcf53b4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);