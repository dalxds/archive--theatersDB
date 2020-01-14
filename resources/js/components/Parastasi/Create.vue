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
        <b-form-group label-for="theatroSelect">
          Θέατρο
          <b-form-select v-model="theatroSelect" :options="theatraOptions" size="lg"></b-form-select>
        </b-form-group>
        <b-form-group label-for="sezon">
          Σεζόν
          <b-form-select v-model="sezon" :options="sezonOptions" size="lg"></b-form-select>
        </b-form-group>
        <b-form-group label-for="enarxi">
          Ημερομηνία Έναρξης
          <b-form-input type="datetime-local" v-model="enarxi" size="lg"></b-form-input>
        </b-form-group>

        <b-form-group label-for="timi">
          Τιμή Ολόκληρου Εισιτηρίου (€)
          <b-form-input type="number" v-model="timi" size="lg"></b-form-input>
        </b-form-group>

        <b-form-invalid-feedback :state="!errors">ERROR</b-form-invalid-feedback>
        <b-button type="submit" class="submit_btn" variant="primary-2" size="lg">Καταχώρηση</b-button>
      </b-form>
    </b-container>
  </div>
</template>

<script>
const sezonOptions = ["2019-2020", "2020-2021"];

export default {
  name: "createparastasi",
  props: {
    theatra: {
      type: Array,
      default: []
    },
    theatrikiparagwgi: {
      type: Number
    }
  },
  data: function() {
    return {
      theatroSelect: null,
      theatro: null,
      aithousa: null,
      sezon: null,
      aithouses: [],
      enarxi: null,
      timi: null,
      errors: null
    };
  },
  methods: {
    submit: async function(e) {
      e.stopPropagation();

      this.errors = null;

      const data = {
        aithousa: this.aithousa,
        theatro: this.theatro,
        sezon: this.sezon,
        enarxi: this.enarxi,
        timi: this.timi
      };

      try {
        const { data: res } = await axios.post(
          "/api/TheatrikiParagwgi/" +
            this.theatrikiparagwgi +
            "/Parastasi/store",
          data
        );

        if (res.success) location.href = res.url;
      } catch (e) {
        this.errors = e.response.data.errors;
      }
    }
  },
  computed: {
    theatraOptions: function() {
      let aithouses = this.$props.theatra.map(function(item) {
        return {
          text: item["Όνομα"] + " - " + item["Όνομα_Αίθουσας"],
          value: item["Θ_ID"] + "_" + item["Όνομα_Αίθουσας"]
        };
      });

      aithouses.splice(0, 0, {
        value: null,
        text: "Επιλέξτε θέατρο και αίθουσα",
        disabled: true
      });

      return aithouses;
    },
    sezonOptions: function() {
      let sezon = sezonOptions.map(i => ({ text: i, value: i }));

      sezon.splice(0, 0, {
        value: null,
        text: "Επιλέξτε σεζόν",
        disabled: true
      });

      return sezon;
    }
  },
  watch: {
    theatroSelect: function() {
      if (this.$data.theatroSelect == "") {
        this.$data.theatro = null;
        this.$data.aithousa = null;
        return;
      }

      const parts = this.$data.theatroSelect.split("_");

      this.$data.theatro = parseInt(parts[0]);
      this.$data.aithousa = parts.slice(1).join("");
    }
  }
};
</script>

<style scoped>
</style>

