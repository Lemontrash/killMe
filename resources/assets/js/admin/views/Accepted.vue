<template>
  <main>
    <div class="page-title">ADMIN PANEL</div>

    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Registration Date</th>
          <th>Phone</th>
          <th class="text-center">Download PDF</th>
          <th class="text-center">Aproved</th>
          <!-- <th class="text-center">Amount</th> -->
        </tr>
      </thead>
      <tbody>
        <tr class="user" v-for="item in data">
          <td>{{ item.user.firstName }} {{ item.user.lastName }}</td>
          <td>{{ item.user.created_at }}</td>
          <td>{{ item.user.mobile }}</td>
          <td class="text-center">
            <a :href="'/admin/downloadPdf/' + item.id">
              <button class="theme-btn btn-blue">Download</button>
            </a>
          </td>
          <td class="text-center">
            <app-switch @input="changeStatus($event, item.id)" v-model="item.approved"/>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
</template>

<script>
import AppSwitch from './../components/Switch.vue'

export default {
  data() {
    return {
      data: [],
    };
  },
  methods: {
    sync() {
      axios.get('/admin/usersWithPdf').then(res => {
        // user , pdf
        this.data = res.data.files.map(n => {
          n.user = res.data.users.find(z => z.id == n.user_id);
          n.approved = n.approved == 'yes' ? true : false;
          return n;
        });
      });
    },
    changeStatus(status, id) {
      if(status) {
        axios.post('/admin/approvePdf/' + id);
      } else {
        axios.post('/admin/dismissPdf/' + id);
      }

    }
  },
  created() {
    this.sync();
  },
  components: {
    AppSwitch,
  }
}
</script>

<style lang="scss" scoped>

.switch {
  margin: 0 auto;
}

</style>
