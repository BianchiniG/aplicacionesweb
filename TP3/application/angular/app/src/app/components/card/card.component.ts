import { Component, OnInit, Input } from '@angular/core';

export class TagItem {
  name: string;
}

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.css']
})

export class CardComponent implements OnInit {
  public arraytags: any;

  @Input() public id: string;
  @Input() public title: string;
  @Input() public shortdesc: string;
  @Input() public tags: TagItem[];
  @Input() public activity: any;

  constructor() {
    this.arraytags = this.tags;
  }

  ngOnInit() {
  }

}
