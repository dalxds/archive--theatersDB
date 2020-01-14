<template>
  <div>
    <section class="has-divider bg-primary-2 text-light">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1>Προσθήκη Παράστασης</h1>
          </div>
        </div>
      </div>
      <div class="divider">
        <svg
          width="100%"
          height="96px"
          viewBox="0 0 100 100"
          version="1.1"
          preserveAspectRatio="none"
          class="injected-svg bg-white"
        >
          <path d="M0,0 C40,33 66,52 75,52 C83,52 92,33 100,0 L100,100 L0,100 L0,0 Z" />
        </svg>
      </div>
    </section>
    <b-container>
      <b-form @submit.stop.prevent="submit">
        <b-form-group label-for="titlos">
          Τίτλος
          <b-input type="text" v-model="titlos" size="lg"></b-input>
        </b-form-group>

        <b-form-group label-for="perigrafi">
          Περιγραφή
          <b-input type="text" v-model="perigrafi" size="lg"></b-input>
        </b-form-group>

        <b-form-group label-for="diarkeia">
          Διάρκεια
          <b-input type="number" v-model="diarkeia" size="lg"></b-input>
        </b-form-group>

        <b-form-invalid-feedback :state="!errors">
          <b-alert show variant="danger">ERROR</b-alert>
        </b-form-invalid-feedback>

        <b-button type="submit" variant="primary" class="submit_btn" size="lg">Δημιουργία</b-button>
      </b-form>
    </b-container>
  </div>
</template>

<script>
export default {
  name: "createtheatrikiparagwgi",
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
        const { data: res } = await axios.post(
          "/api/TheatrikiParagwgi/store",
          data
        );

        if (res.success) location.href = res.url;
      } catch (e) {
        this.errors = e.response.data.errors;
      }
    }
  }
};
</script>

<style scoped>
</style>
