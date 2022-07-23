<template>
  <div class="card mb-sm-3 mb-md-0 contacts_card">
    <div class="card-header">
      <h3 class="d-flex text-white">Đánh giá dịch vụ</h3>
    </div>
    <div class="card-body contacts_body">
      <div class="container">
        <div class="form-group">
          <i
            v-for="score in maxScore"
            :key="score"
            :class="score <= feedback.score ? 'fas ' : 'far '"
            class="fa-star star-icon"
            data-toggle="tooltip" data-placement="top" :title="toolTipRate(score)"
            @click="rate(score)"
          >
          </i>
        </div>
        <div class="form-group">
          <label class="form-label text-white">Nhận xét</label>
          <textarea
            v-model="feedback.note"
            class="form-control"
            name=""
            id=""
            cols="30"
            rows="10"
          ></textarea>
        </div>
        <button @click="submit()" class="btn btn-success btn-block">Gửi</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      maxScore: 5,
      feedback: {
        score: 5,
        note: "Ứng dụng tuyệt vời, rất hữu ích !",
      },
    };
  },
  created() {
    this.fetchFeedback();
  },
  methods: {
    rate(score) {
      this.feedback.score = score;
    },
    async submit() {
      try {
        const form = {
          chatroom_id: this.chatroom_id,
          note: this.feedback.note,
          score: this.feedback.score,
        };
        await this.$axios.post("/feedback", form);
        this.$swal.fire({
          toast: true,
          icon: "success",
          title: "Gửi đánh giá thành công",
          position: "top-end",
          showCloseButton: true,
          timer: 3000,
          showConfirmButton: false,
        });
      } catch (error) {
        this.$swal.fire({
          toast: true,
          icon: "error",
          title: "Gửi đánh giá thất bại",
          position: "top-end",
          showCloseButton: true,
          timer: 3000,
          showConfirmButton: false,
        });
      }
    },
    async fetchFeedback() {
      try {
        const response = await this.$axios.get(`/feedback/latest/${this.chatroom_id}`);
        this.feedback.score = response.data.feedback.score;
        this.feedback.note = response.data.feedback.note;
      } catch (error) {
        console.log(error);
      }
    },
    toolTipRate(score) {
      switch (score) {
        case 1:
          return 'Rất tệ'
        case 2:
          return 'Chưa hài lòng'
        case 3:
          return 'Khá ổn'
        case 4:
          return 'Rất tuyệt'
        case 5:
          return 'Rất hài lòng'
        
        default:
          break;
      }
    }
  },
  computed: {
    chatroom_id() {
      return this.$route.params.roomId;
    },
  },
  mounted () {
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  }
};
</script>

<style>
.star-icon {
  padding-right: 5px;
  color: yellow;
  cursor: pointer;
}
</style>