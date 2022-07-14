<template>
  <div class="d-flex justify-content-end mb-4" v-if="message.sender.id === $root.user.id">
    <div class="msg_container_send" data-toggle="tooltip" data-placement="top" :title="message.created_at">
      {{ message.content }}
    </div>
    <div class="img_cont_msg" data-toggle="tooltip" data-placement="top" :title="`${message.sender.name} (${message.sender.email})`">
      <img :src="'/image/profile/' + message.sender.image" class="rounded-circle user_img_msg">
    </div>
  </div>
  <div class="d-flex justify-content-start mb-4" v-else>
    <div class="img_cont_msg" data-toggle="tooltip" data-placement="top" :title="`${message.sender.name} (${message.sender.email})`">
      <img :src="'/image/profile/' + message.sender.image" class="rounded-circle user_img_msg">
    </div>
    <div class="msg_container" data-toggle="tooltip" data-placement="top" :title="message.created_at">
      {{ message.content }}
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
export default {
  props: {
    message: {
      required: true
    }
  },
  mounted () {
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  }
}
</script>

<style>
</style>