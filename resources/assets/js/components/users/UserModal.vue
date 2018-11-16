<!-- Modal -->
<!--<div id="modal" class="modal fade" tabindex="-1" role="dialog">-->
<!--<div class="modal-dialog modal-sm">-->
<!--<div class="modal-content">-->
<!--<div class="modal-body">-->
<!--<form class="form-horizontal" >-->
<!--<div class="form-group">-->
<!--<div class="col-sm-10">-->
<!--<input type="text" class="form-control" id="lastname" placeholder="Lastname" v-model="user.lastname">-->
<!--</div>-->
<!--</div>-->
<!--<div class="form-group">-->
<!--<div class="col-sm-10">-->
<!--<input type="text" class="form-control" id="name" placeholder="Name" v-model="user.name">-->
<!--</div>-->
<!--</div>-->
<!--<div class="form-group">-->
<!--<div class="col-sm-10">-->
<!--<input type="text" class="form-control" id="emali" placeholder="E-mail" v-model="user.email">-->
<!--</div>-->
<!--</div>-->
<!--<div class="form-group">-->
<!--<div class="col-sm-10">-->
<!--<input type="text" class="form-control" id="password" placeholder="Password" v-model="user.password">-->
<!--</div>-->
<!--</div>-->
<!--<button type="submit" class="btn btn-primary">OK</button>-->
<!--&lt;!&ndash;<button type="button" class="btn btn-default" data-dismiss="modal" v-on="click: editCancel($index)">Отмена</button>&ndash;&gt;-->
<!--</form>-->
<!--</div>-->
<!--</div>-->
<template>
    <div><span>dfdsfdf</span>
    <script type="text/x-template" id="userModal">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                  default body
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  default footer
                  <button class="modal-default-button" @click="$emit('close')">
                    OK
                  </button>
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>
    </div>
</template>