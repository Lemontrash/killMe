<template>
  <main>
    <div class="page-title">ADMIN PANEL</div>

    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Registration Date</th>
          <th>Phone</th>
          <th class="text-center">Email</th>
          <th class="text-center">Aproved</th>
          <th class="text-center">Account</th>
        </tr>
      </thead>
      <tbody>
        <template v-for="user in data">
          <tr @click="collapseUser(user.id)" class="user">
            <th>{{ user.firstName }} {{ user.lastName }}</th>
            <th>{{ user.created_at }}</th>
            <th>{{ user.mobile }}</th>
            <th>{{ user.email }}</th>
            <th class="text-center">
              <app-switch @input="changeStatus($event, user.id)" v-model="user.is_approved"/>
            </th>
            <th class="text-center">Individual</th>
          </tr>
          <user-row :user.sync="user" v-if="opened.includes(user.id)"/>
        </template>
      </tbody>
    </table>
  </main>
</template>

<script>
import UserRow from './../components/UserRow.vue'
import AppSwitch from './../components/Switch.vue'

export default {
  data() {
    return {
      data: [],
      opened: [],
    };
  },
  components: {
    UserRow,
    AppSwitch,
  },
  methods: {
    sync() {
      axios.get('/admin/files').then(res => {
        res.data = res.data.map(n => {
          // n.approved = {
          //   picture: {
          //     id: 0,
          //     status: false,
          //   },
          //   selfie: {
          //     id: 0,
          //     status: false,
          //   },
          //   bank: {
          //     id: 0,
          //     status: false,
          //   },
          //   dod: {
          //     id: 0,
          //     status: false,
          //   },
          // };
          n.is_approved = n.is_approved == 'yes' ? true : false;
          return n;
        });
        this.data = res.data;
      })
    },
    collapseUser(id_user) {
      if(this.opened.includes(id_user)) {
        this.opened = this.opened.filter(n => n != id_user);
      } else {
        this.opened.push(id_user);
      }
    },
    changeStatus(status, id) {
      axios.post('/admin/changeUserStatus/' + id, {
        status: status
      });
    }
  },
  created() {
    this.sync();
  }
}
</script>

<style lang="scss" scoped>

@import "~@/vars.scss";

table {
  border-bottom: 0 !important;
  .user {
    cursor: pointer;
    border-bottom: 1px solid $clr-d-gray;
  }
}

</style>
