<template>
  <v-app>
    <v-main>
      <v-container fluid>
        <v-simple-table>
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">
                  Placa
                </th>
                <th class="text-left">
                  Proprietário
                </th>
                <th class="text-left">
                  Valor
                </th>
                <th class="text-left">
                  Data Inicio
                </th>
                <th class="text-left">
                  Data Fim
                </th>
                <th class="text-left">
                  Status
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="frete in fretes"
                :key="frete.id"
              >
                <td>{{ frete.board }}</td>
                <td>{{ frete.vehicle_owner }}</td>
                <td>{{ frete.amount }}</td>
                <td>{{ frete.start_date }}</td>
                <td>{{ frete.end_date }}</td>
                <td>{{ frete.status }}</td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import { allFretes } from '../services/api'

export default {
  name: 'Fretes',
  created: function () {
    allFretes().then(response => {
      if (!response.status) {
        this.fretes = response.data;
      }

      if (response.status === 401) {
        localStorage.removeItem('_token_frete')
        this.$router.replace('login')
      }
    })

  },
  data: () => ({
    fretes: []
  })
}
</script>
