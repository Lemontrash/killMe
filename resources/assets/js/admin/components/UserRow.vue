<template>
  <tr class="user-menu">
    <td colspan="6">
      <div class="files">
        <div class="item">
          <div class="head">
            ID Picture
          </div>
          <div class="sub-text">
            Files Status
          </div>
          <app-switch @input="updatePictureStatus" v-model="user.approved.picture.status"/>
          <button @click="downloadPicture">
            <i class="fa fa-copy"></i>
            View Files
            <i class="fa fa-angle-right"></i>
          </button>
        </div>
        <div class="item">
          <div class="head">
            Selfie Picture
          </div>
          <div class="sub-text">
            Files Status
          </div>
          <app-switch @input="updateSelfieStatus" v-model="user.approved.selfie.status"/>
          <button @click="downloadSelfie">
            <i class="fa fa-copy"></i>
            View Files
            <i class="fa fa-angle-right"></i>
          </button>
        </div>
        <div class="item">
          <div class="head">
            Bank transfer
          </div>
          <div class="sub-text">
            Files Status
          </div>
          <app-switch @input="updateBankStatus" v-model="user.approved.bank.status"/>
          <button @click="downloadBank">
            <i class="fa fa-copy"></i>
            View Files
            <i class="fa fa-angle-right"></i>
          </button>
        </div>
        <div class="item">
          <div class="head">
            DOD
          </div>
          <div class="sub-text">
            Files Status
          </div>
          <app-switch @input="updateDODStatus" v-model="user.approved.dod.status"/>
          <button @click="downloadDod">
            <i class="fa fa-copy"></i>
            View Files
            <i class="fa fa-angle-right"></i>
          </button>
        </div>
        <div class="title">Files</div>
      </div>
      <!-- <div class="transfer">
        <div class="item">
          <div class="date">
            15 / 02 / 2019
          </div>
          <div>
            <button class="theme-btn btn-blue">Download</button>
          </div>
        </div>
        <div class="item">
          <div class="date">
            15 / 02 / 2019
          </div>
          <div>
            <button class="theme-btn btn-blue">Download</button>
          </div>
        </div>
        <div class="title">Transfer Requests</div>
      </div> -->
    </td>
  </tr>
</template>

<script>
import AppSwitch from './Switch.vue'

export default {
  props: {
    user: {
      type: Object,
      required: true,
    }
  },
  methods: {
    updatePictureStatus(status) {
      if(status) {
        axios.post('/admin/approveId/' + this.user.approved.picture.id).then(res => {
          this.user.approved.picture.status = true;
        });
      } else {
        axios.post('/admin/dismissId/' + this.user.approved.picture.id).then(res => {
          this.user.approved.picture.status = false;
        });
      }
    },
    updateSelfieStatus(status) {
      if(status) {
        axios.post('/admin/approveSelfie/' + this.user.approved.selfie.id).then(res => {
          this.user.approved.selfie.status = true;
        });
      } else {
        axios.post('/admin/dismissSelfie/' + this.user.approved.selfie.id).then(res => {
          this.user.approved.selfie.status = false;
        });
      }
    },
    updateBankStatus(status) {
      if(status) {
        axios.post('/admin/approveBank/' + this.user.approved.bank.id).then(res => {
          this.user.approved.bank.status = true;
        });
      } else {
        axios.post('/admin/dismissBank/' + this.user.approved.bank.id).then(res => {
          this.user.approved.bank.status = false;
        });
      }
    },
    updateDODStatus(status) {
      if(status) {
        axios.post('/admin/approveDod/' + this.user.approved.dod.id).then(res => {
          this.user.approved.dod.status = true;
        });
      } else {
        axios.post('/admin/dismissDod/' + this.user.approved.dod.id).then(res => {
          this.user.approved.dod.status = false;
        });
      }
    },
    downloadPicture(id_file) {
      axios.get('/admin/downloadId/' + id_file).then(res => {

      });
    },
    downloadSelfie(id_file) {
      axios.get('/admin/downloadSelfie/' + id_file).then(res => {

      });
    },
    downloadBank(id_file) {
      axios.get('/admin/downloadBank/' + id_file).then(res => {

      });
    },
    downloadDod(id_file) {
      axios.get('/admin/downloadDod/' + id_file).then(res => {

      });
    }
  },
  components: {
    AppSwitch,
  }
}
</script>

<style lang="scss" scoped>

@import "~@/vars.scss";

.user-menu {
  border-bottom: 1px solid $clr-d-gray;
  td[colspan="6"] {
    padding: 0;
  }
  .files {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
    padding: 40px 0;
    position: relative;
    .item {
      padding-right: 40px;
      padding-left: 30px;
      border-right: 1px solid $clr-d-gray;
      .head {
        font-weight: bold;
        color: #fff;
        font-size: 18px;
      }
      .sub-text {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.5);
      }
      .switch {
        margin: 10px 0;
      }
      button {
        color: #fff;
      }
      &:last-child {
        border-right: 0;
      }
      &:first-child {
        padding-left: 0;
      }
    }
  }
  .transfer {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-items: stretch;
    border-top: 1px solid $clr-d-gray;
    padding: 40px 0;
    position: relative;
    .item {
      padding: 0 30px;
      border-right: 1px solid $clr-d-gray;
      text-align: center;
      .date {
        color: $clr-light;
        padding-bottom: 15px;
      }
      .theme-btn {
        font-size: 10px;
        padding: 0 15px;
        height: 30px;
      }
      &:last-child {
        border-right: 0;
      }
      &:first-child {
        padding-left: 0;
      }
    }
  }
  .files .title,
  .transfer .title {
    position: absolute;
    font-size: 15px;
    font-weight: bold;
    color: #fff;
    top: -12px;
    left: 0;
    height: 20px;
    line-height: 20px;
    background: #343c53;
    padding-right: 10px;
  }
}

</style>
