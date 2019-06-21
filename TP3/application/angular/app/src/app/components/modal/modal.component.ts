import { ModalService } from './modal.service';
import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-modal',
  templateUrl: './modal.component.html',
  styleUrls: ['./modal.component.css']
})
export class ModalComponent implements OnInit {
  public activity_id: any;
  public activity_data: any[];
  
  @Input() id:any;

  constructor(private modalService: ModalService) {
    this.activity_id = this.id;
  }

  ngOnInit() {
    return 1;
    // return this.modalService.getActivity(this.activity_id).subscribe(data => this.activity_data = data);
  }
}
