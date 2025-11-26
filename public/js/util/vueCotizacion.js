/*
|--------------------------------------------------------------------------
| Vue 3 Script for Cotización
|--------------------------------------------------------------------------
*/

const appCotizacion = Vue.createApp({

    // 🔹 VARIABLES REACTIVAS
    data() {
        return {
            urlBase: window.location.origin,
            ruta: "/cotizacion/",

            cargando: false,
            mensaje: "kkkkkkkkkkkkk",

            cotizacion: {},
            detalles: [],
            nameModulo: {
                index: 0,
                crear: 0,
                editar: 0,
                detalle: 0,
            },
            cotizacion: {
                id: ''
            },
            listaCotizaciones: []
        }
    },

    // 🔹 MÉTODOS DEL COMPONENTE
    methods: {

        async hola() {
            console.log("Iniciando módulo cotización...");

            const url = window.location.pathname;
            const partes = url.split("/");

            // Ejemplo: /modulo/cotizacion/editar/33
            const cotizacionId = partes[4] ?? null;

            if (cotizacionId) {
                await this.cargarCotizacion(cotizacionId);
            }

            if (parseInt(this.nameModulo.index) == 1) {
                console.log('dddddddddddddddd');
                this.readCotizaciones();

            } else if (parseInt(this.nameModulo.crear) == 1) {
                await this.listarMarcas();

            }
        },

        async readCotizaciones() {
            try {
                const { data } = await axios.get(`${window.Laravel.baseUrl}/showCotizacionesJSON`)
                this.listaCotizaciones = data;
            } catch (error) {
                console.error(error);
            }
        }

    },

    // 🔹 SE EJECUTA AUTOMÁTICAMENTE CUANDO VUE CARGA EL DOM
    async mounted() {
        console.log("VueCotizacion montado");
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
appCotizacion.mixin(globalMixin);

// monta Vue y guarda la instancia en variable global
window.vmCotizacion = appCotizacion.mount("#vueCotizacion");

