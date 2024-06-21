// card.service.ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class CardService {

  private apiUrl = 'http://localhost:9500';

  constructor(private http: HttpClient) { }

  getCards(): Observable<any> {
    return this.http.get<any>(`${this.apiUrl}/cards`);
  }
  getSortedCards(cardsList): Observable<any> {
    return this.http.post<any>(`${this.apiUrl}/sort-cards`, {'cards':cardsList} );
  }
}
