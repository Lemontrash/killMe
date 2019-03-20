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
          <th class="text-center">Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr class="user" v-for="item in data">
          <td>{{ item.user.firstName }} {{ item.user.lastName }}</td>
          <td>{{ item.user.created_at }}</td>
          <td>{{ item.user.mobile }}</td>
          <td></td>
          <td class="text-center">Individual</td>
        </tr>
      </tbody>
    </table>
  </main>
</template>

<script>
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
        this.data = res.data.pdf.map(n => {
          n.user = res.data.users.find(z => z.id == n.user_id);
          return n;
        });
      });
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
