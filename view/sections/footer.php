</main>
<script>
    $(document).ready(function() {
        $('.chosen-select').chosen({
            width: '100%',
            placeholder_text_multiple: 'Select users'
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const dragItems = document.querySelectorAll('.dragNdrop');
        const dropZones = document.querySelectorAll('#todo-card-article, #doing-card-article, #review-card-article, #done-card-article');
        
        dragItems.forEach(item => {
            item.setAttribute('draggable', 'true');
            
            item.addEventListener('dragstart', handleDragStart);
            item.addEventListener('dragend', handleDragEnd);
            
            item.querySelectorAll('img, a').forEach(element => {
                element.addEventListener('mousedown', (e) => {
                    e.stopPropagation();
                    item.draggable = false;
                });
            });
        });
        
        dropZones.forEach(zone => {
            zone.addEventListener('dragover', handleDragOver);
            zone.addEventListener('dragenter', handleDragEnter);
            zone.addEventListener('dragleave', handleDragLeave);
            zone.addEventListener('drop', handleDrop);
        });
        
        let draggedItem = null;
        
        function handleDragStart(e) {
            draggedItem = this;
            e.dataTransfer.setData('text/plain', e.target.dataset.taskId);
            this.classList.add('dragging');
            document.body.classList.add('dragging-active');
        }
        
        function handleDragEnd(e) {
            this.classList.remove('dragging');
            document.body.classList.remove('dragging-active');
            dropZones.forEach(zone => {
                zone.classList.remove('drag-over');
            });
            draggedItem = null;
        }
        
        function handleDragOver(e) {
            e.preventDefault();
            return false;
        }
        
        function handleDragEnter(e) {
            e.preventDefault();
            this.classList.add('drag-over');
        }
        
        function handleDragLeave(e) {
            if (e.target === this) {
                this.classList.remove('drag-over');
            }
        }
        
        function handleDrop(e) {
            e.preventDefault();
            e.stopPropagation();
            
            this.classList.remove('drag-over');
            
            const taskId = e.dataTransfer.getData('text/plain');
            const dropZoneId = e.currentTarget.id;
            let newStatus;
            
            switch(dropZoneId) {
                case 'todo-card-article':
                    newStatus = 'To Do';
                    break;
                case 'doing-card-article':
                    newStatus = 'Doing';
                    break;
                case 'review-card-article':
                    newStatus = 'Review';
                    break;
                case 'done-card-article':
                    newStatus = 'Done';
                    break;
                default:
                    console.error('Unknown drop zone');
                    return;
            }
            
            if (taskId && newStatus) {
                
                const formData = new URLSearchParams();
                formData.append('taskId', taskId);
                formData.append('status', newStatus);
                
                fetch('index.php?action=updateStatus', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: formData.toString()
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Server response:', data); 
                    
                    if (data.success) {
                        location.reload();
                    } else {
                        console.error('Failed to update task status:', data);
                        if (draggedItem && draggedItem.parentNode) {
                            draggedItem.parentNode.appendChild(draggedItem);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error updating task status:', error);
                    if (draggedItem && draggedItem.parentNode) {
                        draggedItem.parentNode.appendChild(draggedItem);
                    }
                });
            }
        }
    });

</script>
<script src="assets/js/main.js"></script>
</body>
</html>
