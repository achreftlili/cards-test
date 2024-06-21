// card-list.component.ts
import { Component, OnInit } from '@angular/core';
import {CardService} from "../services/card.service";

@Component({
  selector: 'app-card-list',
  templateUrl: './card-list.component.html',
  styleUrls: ['./card-list.component.scss']
})
export class CardListComponent implements OnInit {
  private cardsList: any;


  constructor(private cardService: CardService) { }

  ngOnInit(): void {
    this.getCards();
  }
  getCards(): void {
    this.cardService.getCards().subscribe(
      (response) => {
        this.cardsList = response;
      },
      (error) => {
        console.error('Error sorting cards:', error);
      }
    );
  }
  sortCards(): void {
    this.cardService.getSortedCards(this.cardsList).subscribe(
      (response) => {
        this.cardsList = response;
      },
      (error) => {
        console.error('Error sorting cards:', error);
      }
    );
  }
}
