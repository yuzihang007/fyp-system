
<!--title input/edit form-->

         <form method="post" action="">
{{--             {{url('supervisor/titleSave')}}--}}
             @csrf


             <div class="form-group mb-2">
                 <label for="inputTopic_id">Topic ID</label>
                 <input type="text" name="topic_id"
                        class="form-control " id="inputTopic_id" aria-disabled="topicHelp" value="{{old('topic_id')}}">
                 <small id="topicHelp" class="form-text text-muted">initial word of your topic ID. eg,. Sylvia Wong - SW</small>
             </div>



             <div class="form-group mb-4">
                 <label for="inputTitle">Project Title</label>
                 <input type="text" name="project_title"
                        class="form-control" id="inputTitle"
                        value="{{old('project_title')}}">
             </div>
{{--             value="{{old('project_title')?('project_title'):$title ?? ''->project_title}}"--}}



             <div class="form-group mb-4">
                 <label for="inputTitle">Keywords</label>
                 <input type="text" name="keywords"
                        class="form-control" id="inputTitle"
                        value="{{old('keywords')}}">
             </div>

{{--             value="{{old('project_title')?('project_title'):$title ?? ''->project_title}}"--}}



             <div class="form-group mb-3">
                 <div class="form-check-inline">
                     <label for="inputSuitableFor1">
                         <input class="form-check-input" type="checkbox" name="suitable_for[]" id="inputSuitableFor1" value="AI"
                                checked>
                         <label class="form-check-label" for="inputSuitableFor1">AI</label>
                     </label>
                 </div>

                 <div class="form-check-inline">
                     <label for="inputSuitableFor2">
                         <input class="form-check-input" type="checkbox" name="suitable_for[]" id="inputSuitableFor2" value="CS">
                         <label class="form-check-label" for="inputSuitableFor1"> CS </label>
                     </label>
                 </div>
             </div>



             <div class="form-group mb-2">
                 <label for="inputDescription" >Description</label>
                 <textarea name="description" class="form-control"
                           id="summernote" rows="15"
                           value="{{old('description')}}">
{{--                     {{old('description')?('description'):$title ?? ''->description}}--}}
                 </textarea>
                 <script>
                     $('#summernote').summernote({
                         placeholder: 'Hello Bootstrap 4',
                         tabsize: 2,
                         height: 100
                     });
                 </script>

             </div>

             <div class="form-group mb-2">
                 <div class="col-2">
                     <button type="submit" class="btn btn-primary mb-2">Submit</button>
                 </div>
             </div>

         </form>
