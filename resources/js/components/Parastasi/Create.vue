<template>
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

      <b-button type="submit" class="submit_btn" size="lg">Καταχώρηση</b-button>
    </b-form>
  </b-container>
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

