<template>
    <v-app>
    <v-container>
      <v-row>
        <v-col cols="12" sm="6" md="4">
          <v-text-field v-model.number="length" label="Length (feet)" type="number" required></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="4">
          <v-text-field v-model.number="width" label="Width (feet)" type="number" required></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="4">
          <v-text-field v-model.number="height" label="Height (feet)" type="number" required></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="4">
          <v-text-field v-model.number="roofSlope" label="Roof Slope (optional)" type="number"></v-text-field>
        </v-col>
        <v-col cols="12" sm="6" md="4">
          <v-select v-model="selectedRValue" :items="rValues" label="Select R-Value" required></v-select>
        </v-col>
      </v-row>
      <v-btn @click="calculateVolume" color="primary">Calculate</v-btn>
      <v-divider></v-divider>
        <v-card v-if="insulationVolume" class="mx-auto mt-4" max-width="400">
        <v-card-title class="blue lighten-2 white--text">Insulation Volume Needed</v-card-title>
        <v-card-text class="text-center">
            <v-icon x-large color="blue">mdi-thermometer</v-icon>
            <div class="display-1">{{ insulationVolume }} cubic feet</div>
        </v-card-text>
        </v-card>
    </v-container>
</v-app>
  </template>
  
  <script>
  export default {
    data() {
      return {
        length: null,
        width: null,
        height: null,
        roofSlope: null,
        selectedRValue: null,
        rValues: [30, 38, 49, 60], // Sample R-Value options, modify as needed
        insulationVolume: null
      };
    },
    methods: {
      calculateVolume() {
        // Assuming the backend API endpoint is '/calculate-insulation'
        const data = {
          length: this.length,
          width: this.width,
          height: this.height,
          roofSlope: this.roofSlope,
          selectedRValue: this.selectedRValue
        };

        axios.post('/api/calculate-insulation', data)
        .then(response => {
            this.insulationVolume = response.data.insulation_volume.toFixed(2);
        });
      }
    }
  };
  </script>
  