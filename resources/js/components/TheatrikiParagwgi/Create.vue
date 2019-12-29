<template>
    <b-form @submit.stop.prevent="submit">
        <b-form-group label-for="titlos">
            Τίτλος
            <b-input
                type="text"
                v-model="titlos"
            ></b-input>
        </b-form-group>

        <b-form-group label-for="perigrafi">
            Περιγραφή
            <b-input
                type="text"
                v-model="perigrafi"
            ></b-input>
        </b-form-group>

        <b-form-group label-for="diarkeia">
            Διάρκεια
            <b-input
                type="number"
                v-model="diarkeia"
            ></b-input>
        </b-form-group>

        <b-form-invalid-feedback :state="!errors">
            ERRORS
        </b-form-invalid-feedback>

        <b-button type="submit" variant="primary">Δημιουργία</b-button>
    </b-form>
</template>

<script>
    export default {
        name: 'createtheatrikiparagwgi',
        data: function() {
            return {
                titlos: null,
                diarkeia: 0,
                perigrafi: null,
                errors: null
            };
        },
        methods: {
            submit: async function(e) {
                e.stopPropagation();

                this.errors = null;

                const data = {
                    titlos: this.titlos,
                    diarkeia: this.diarkeia,
                    perigrafi: this.perigrafi
                };

                try {
                    const {data:res} = await axios.post('/api/TheatrikiParagwgi/store', data);

                    if (res.success)
                        location.href = res.url;
                }
                catch (e) {
                    this.errors = e.response.data.errors;
                }
            }
        }
    }
</script>

<style scoped>

</style>
