// vueMixins.js
const globalMixin = {
    data() {
        return {
            holafreddy: 'como estas freddy',
            permisosUsuario: {
                menu_id: 0,
                usuario_id: 0,
                pagindex: 0,
                crear: 0,
                editar: 0,
                eliminar: 0,
                verdetalle: 0,
                expexcel: 0,
                expopdf: 0,
                restablecer: 0,
                urlMenu: ''
            },
            
            urlPublicImg: "/Sistema/default/public/img/",

            usuarios: {
                perfil_id: 0,
            },

            // Editar
            editingIndex: null,
        };
    },

    methods: {
        /**************************/
        /******** LOADER *********/
        /************************/
        mostrarLoader() {
            document.getElementById('loader-overlay').style.display = 'flex';
        },
        ocultarLoader() {
            document.getElementById('loader-overlay').style.display = 'none';
        },
        cargarDatos(resultado, time = 0) {
            console.log('lo retornado es = ', resultado);
            this.mostrarLoader();

            // Convertir segundos a milisegundos si time > 0
            const delay = time > 0 ? time * 1000 : 0;

            if (resultado === true) {
                if (delay > 0) {
                    setTimeout(() => {
                        this.ocultarLoader();
                    }, delay);
                } else {
                    this.ocultarLoader();
                }
            } else {
                console.warn('Resultado fue falso, no se oculta el loader.');
            }
        },



        /*****************************************************************/
        /****************************************************************/
        /************* EXTRAS ******************************************/
        /**************************************************************/
        /*************************************************************/
        validarInternet() {
            let rptInternet = true;
            if (!navigator.onLine) {
                // No hay conexión a Internet
                Swal.fire({
                    title: 'Error de conexión',
                    text: 'No hay conexión a Internet. Por favor, comprueba tu conexión e intenta nuevamente.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
                rptInternet = false;
            }
            return rptInternet;
        },
    },

    computed: {
        soloAdministradores() {
            return [1, 8].includes(parseInt(this.usuarios.perfil_id));
        },
        soloLogistica() {
            return [5].includes(parseInt(this.usuarios.perfil_id));
        },
        soloAlmacen() {
            return [4].includes(parseInt(this.usuarios.perfil_id));
        },
        soloVendedores() {
            return [2].includes(parseInt(this.usuarios.perfil_id));
        },
    },

    filters: {
        // 🔹 Filtros globales
        numeroDecimal2: function (value) {
            return numeral(value).format("0,000.00");
        },

        datetimePeru: function (value) {
            if (!value) {
                return;
            } else {
                var nuevo = new String(value);
                let segments = nuevo.split(' ');
                let segmentCount = segments.length;

                if (segmentCount == 2) {
                    let [fecha, hora] = segments;
                    let [ano, mes, dia] = fecha.split('-');
                    let fechaFormateada = `${dia}-${mes}-${ano}`;
                    return `${fechaFormateada} ${hora}`;
                } else if (segmentCount == 1) {
                    let [fecha] = segments;
                    let [ano, mes, dia] = fecha.split('-');
                    let fechaFormateada = `${dia}-${mes}-${ano}`;
                    return fechaFormateada;
                } else {
                    return "Fecha no compatible";
                }
            }
        },

    }
};
