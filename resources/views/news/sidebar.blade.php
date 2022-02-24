<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; left: 1021.5px; top: 0px;">
    <div class="widget ">
       <h4 class="widget-title">@lang('news.hot')</h4>
       <div class="post-thumbnail-list">
          <div class="post-thumbnail-entry w-100" v-for="(post, index) in popular">
             <img alt="sidebar-img" :src="post['image']">
             <div class="post-thumbnail-content">
                <a v-bind:href="news_link(post.id)">@{{ post.title }}</a>
                <span class="post-date"><i class="icon-eye"></i> @{{ post.read_count | number2format(0) }}</span>
             </div>
          </div>
       </div>
    </div>
 </div>