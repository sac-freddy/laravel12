/*
|--------------------------------------------------------------------------
| Vue 3 Script for Cotización
|--------------------------------------------------------------------------
*/

const appArticulo = Vue.createApp({

    // 🔹 VARIABLES REACTIVAS
    data() {
        return {
            urlBase: window.location.origin,
            ruta: "/articulo/",

            cargando: false,
            mensaje: "kkkkkkkkkkkkk",

            articulo: {},
            detalles: [],

            articulo: {
                id: ''
            },
            listaArticulos: []
        }
    },

    // 🔹 MÉTODOS DEL COMPONENTE
    methods: {

        async hola() {
            console.log("Iniciando módulo cotización...");

            const url = window.location.pathname;
            const partes = url.split("/");

            // Ejemplo: /modulo/articulo/editar/33
            const articuloId = partes[4] ?? null;

            if (articuloId) {
                await this.cargarArticulo(articuloId);
            }

            if (parseInt(this.nameModulo.index) == 1) {
                console.log('dddddddddddddddd');
                this.readArticulos();

            } else if (parseInt(this.nameModulo.crear) == 1) {
                await this.listarMarcas();

            }
        },

        async readArticulos(page = 1) {
            try {
                const response = await axios.get(`${window.Laravel.baseUrl}/showArticulosJSON?page=${page}`);

                console.log("response", response);

                this.listaArticulos = response.data.data;
                this.pagination = response.data.pagination;

                /*Swal.fire({
                    title: "Éxito",
                    text: response.data.message,
                    icon: "success"
                });*/

            } catch (error) {
                console.error(error);
                Swal.fire({
                    title: "Error",
                    text: "Hubo un problema al cargar los articulos",
                    icon: "error"
                });
            }
        },


        



    },

    // 🔹 SE EJECUTA AUTOMÁTICAMENTE CUANDO VUE CARGA EL DOM
    async mounted() {
        console.log("VueArticulo montado");
        // Activar el módulo desde Blade
        if (window.moduloActivo) {
            const modulo = window.moduloActivo;
            if (this.nameModulo.hasOwnProperty(modulo)) {
                this.nameModulo[modulo] = 1;
            }
        }
        await this.hola();
    },

    // 🔹 PROPIEDADES COMPUTADAS
    computed: {
        total() {
            return this.detalles.reduce((sum, item) => sum + item.subtotal, 0);
        }
    }
});


// Registrar mixin global en esta app
appArticulo.mixin(globalMixin);

// monta Vue y guarda la instancia en variable global
window.vmArticulo = appArticulo.mount("#vueArticulo");

