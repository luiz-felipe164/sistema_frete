<template>
  <v-app>
    <v-main>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="primary">
                <v-toolbar-title>Sistema de Fretes</v-toolbar-title>
              </v-toolbar>
              <v-card-text>
                <form ref="form" @submit.prevent="login()">
                  <v-text-field
                    v-model="email"
                    name="email"
                    label="Email"
                    type="text"
                    placeholder="email"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="password"
                    name="password"
                    label="Password"
                    type="password"
                    placeholder="password"
                    required
                  ></v-text-field>
                  <v-progress-circular
                    v-if="loading"
                    indeterminate
                    color="primary"
                  ></v-progress-circular>
                  <v-btn
                    v-if="!loading"
                    type="submit"
                    class="mt-4"
                    color="primary"
                    value="log in"
                    >Login</v-btn
                  >
                  <v-alert v-if="alert" border="top" color="red lighten-2" dark>
                    I'm an alert with a top border and red color
                  </v-alert>
                </form>
              </v-card-text>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import { login } from "../services/api";

export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      loading: false,
      alert: false,
    };
  },
  methods: {
    async login() {
      this.loading = true;
      const response = await login(this.email, this.password);
      this.loading = false;

      if (response.status === 401) {
        this.setAlert();
      }
    },
    setAlert(color, message) {},
  },
};
</script>